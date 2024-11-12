<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import {onMounted } from "vue";
const props = defineProps({
    data: Object,
});
onMounted(()=>{
    console.log(props.data[0]);
})
const deleteRecord = (id) => {
    router.delete(`/enseigner/${id}`);
    location.reload();
}
</script>
<template>
    <Head title="modules" />
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
                    <div class="flex justify-between items-center w-full md:px-2">
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
                                :href="route('enseigner.create')"
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
                                            Nom de module
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nom de salle
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nom de proffesseur
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Heure Debut
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Heure Fin
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b"
                                        v-for="i in props.data"
                                        :key="i.id"
                                    >
                                        <th
                                            scope="row"
                                            class="text-gray-600 px-6 py-4 font-medium whitespace-nowrap"
                                        >
                                            {{ i.modules.nom_module }}
                                        </th>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.salles.nom_salle }}
                                        </td>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.users.nom }} {{ i.users.prenom }}
                                        </td>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.type_cours }}
                                        </td>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.date_deroulement }}
                                        </td>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.heure_debut }}
                                        </td>
                                        <td class="text-gray-600 px-6 py-4">
                                            {{ i.heure_fin }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <Link
                                                :href="
                                                    route('enseigner.edit', i.id)
                                                "
                                                class="font-medium hover:underline text-blue"
                                                >Edit</Link
                                            >
                                            <a
                                                :href="
                                                    route('enseigner.show', i.id)
                                                "
                                                target="_blank"
                                                class="font-medium hover:underline text-yellow-600 ps-5 cursor-pointer"
                                                >Support</a
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
