<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import Pagination from "@/Components/Pagination.vue";
import { onMounted } from "vue";
const props = defineProps({
    data: Object,
});
onMounted(() => {
    console.log(props.data);
});
const deleteRecord = (id) => {
    router.delete(`/materiels/${id}`);
};
</script>
<template>
    <Head title="Materiels" />
    <div class="flex flex-row gap-x-3 font-Aldrich">
        <Sidebar />
        <div class="flex flex-col w-full">
            <Header />
            <div class="bg-white mx-20 py-5">
                <h1 class="text-3xl text-green font-medium">
                    Bonjour {{ $page.props.auth.user.prenom }}
                    {{ $page.props.auth.user.nom }}
                </h1>
            </div>
            <div
                class="bg-beige px-3 flex flex-col items-center md:flex-row rounded-lg pt-2 pb-3 ml-20 mt-2 justify-center"
            >
                <div class="w-full p-0 flex flex-col md:items-start">
                    <!-- search field -->
                    <div
                        class="flex justify-between items-center w-full md:px-2"
                    >
                        <div class="w-1/3 max-md:w-1/2 my-2">
                            <form class="relative">
                                <input
                                    type="text"
                                    placeholder="Recherche"
                                    class="w-full p-2 placeholder:px-5 rounded-full focus:ring-orange focus:border-orange"
                                    name=""
                                    id=""
                                />
                            </form>
                        </div>
                        <div class="my-2">
                            <Link
                                :href="route('materiels.create')"
                                class="bg-green text-white px-3 py-2 border border-green rounded-lg hover:text-green hover:bg-white"
                            >
                                Ajouter <i class="fa-solid fa-plus"></i>
                            </Link>
                        </div>
                    </div>
                    <div class="w-11/12 md:w-full">
                        <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500"
                            >
                                <thead
                                    class="text-xs text-white uppercase bg-green"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            CAB
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Designation
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Quantite
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Etat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Localisation
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b"
                                        v-for="i in props.data.data"
                                        :key="i.id"
                                    >
                                        <th
                                            scope="row"
                                            class="text-gray-600 px-6 py-4 font-medium whitespace-nowrap"
                                        >
                                            {{ i.cab }}
                                        </th>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.designation }}
                                        </td>

                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.quantite }}
                                        </td>

                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.etat }}
                                        </td>

                                        <td class="text-gray-600 px-6 py-4">
                                            Salle : {{ i.salle.nom_salle }}
                                            <br />
                                            Placard :
                                            {{ i.placard.num_placard }} <br />
                                            Etagere :
                                            {{ i.etagere.num_etagere }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <Link
                                                :href="
                                                    route('materiels.edit', i.id)
                                                "
                                                class="font-medium hover:underline text-blue"
                                                >Edit</Link
                                            >
                                            <Link
                                                :href="
                                                    route('materiels.show', i.id)
                                                "
                                                class="font-medium hover:underline text-yellow-300 ps-5"
                                                >View</Link
                                            >

                                            <a
                                                @click="deleteRecord(i.id)"
                                                class="font-medium hover:underline text-red-600 ps-5 cursor-pointer"
                                                >Delete</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex items-center justify-center py-3">
                                <Pagination :links="props.data.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
