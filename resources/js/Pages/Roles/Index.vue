<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
const props = defineProps({
    roles: Object,
});
</script>
<template>
    <Head title="Roles" />
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
                        class="flex justify-end items-center w-full md:px-2"
                    >
                        <!-- <div class="w-1/3 max-md:w-1/2 my-2">
                            <form class="relative">
                                <input
                                    type="text"
                                    placeholder="Chercher un role"
                                    class="w-full p-2 placeholder:px-5 rounded-full focus:ring-orange focus:border-orange"
                                    name=""
                                    id=""
                                />
                            </form>
                        </div> -->
                        <div class="my-2">
                            <Link
                                :href="route('roles.create')"
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
                                        <th scope="col" class="px-4 py-3">
                                            Role
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Permissions
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b"
                                        v-for="i in props.roles"
                                        :key="i.id"
                                    >
                                        <th
                                            scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"
                                        >
                                            {{ i.name }}
                                        </th>
                                        <td class="px-4 py-3">
                                            <span
                                                v-for="j in i.permissions"
                                                :key="j.id"
                                                >{{ j.name }}</span
                                            >
                                        </td>
                                        <td class="py-3 px-4">
                                            <Link
                                                class="text-blue"
                                                :href="
                                                    route('roles.edit', i.id)
                                                "
                                                >Edit</Link
                                            >
                                            <Link
                                                class="text-red-600 ps-4"
                                                :href="
                                                    route('roles.destroy', i.id)
                                                "
                                                method="delete"
                                                as="button"
                                                >Delete</Link
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
