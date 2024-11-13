<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Sidebar from '@/Components/Dashboard/Sidebar.vue';
import Header from '@/Components/Dashboard/Header.vue';
</script>

<template>
    <!-- <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 "
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg "
                >
                    <div class="p-6 text-gray-900 ">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout> -->
    <Head title="Dashboard" />
    <Sidebar/>
    <Header/>
    <div class="bg-white mx-20 py-5 font-Aldrich">
        <h1 class="md:text-3xl max-md:text-sm text-green font-medium">
            Bonjour {{ $page.props.auth.user.prenom }} {{ $page.props.auth.user.nom }}
        </h1>
    </div>
</template>
