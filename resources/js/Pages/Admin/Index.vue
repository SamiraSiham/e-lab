<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from "@inertiajs/vue3";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import Header from "@/Components/Dashboard/Header.vue";
import Schedule from "@/Components/Dashboard/Schedule.vue";

import { onMounted } from "vue";
const props = defineProps({
    user_count: Number,
    materiel_count: Number,
    salle_count: Number,
    events: Array,
    roles: Array,
    userList: Object,
});
// onMounted(() => {
//     console.log(props);
// });
</script>

<template>
    <Head title="Admin" />
    <Sidebar />
    <Header />
    <div class="bg-white mx-20 py-5 font-Aldrich">
        <h1 class="md:text-3xl max-md:text-sm text-green font-medium">
            Bonjour {{ $page.props.auth.user.prenom }}
            {{ $page.props.auth.user.nom }}
        </h1>
        <!-- statistics -->
        <div class="flex items-center justify-center">
            <div class="w-full grid grid-cols-3 gap-4 py-3">
                <!-- utilisateurs -->
                <div>
                    <Link
                        :href="route('users.index')"
                        class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                    >
                        <svg
                            width="90px"
                            height="90px"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g
                                id="SVGRepo_tracerCarrier"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></g>
                            <g id="SVGRepo_iconCarrier">
                                <circle
                                    cx="12"
                                    cy="9"
                                    r="3"
                                    stroke="current"
                                    class="stroke-orange"
                                    stroke-width="1.5"
                                ></circle>
                                <path
                                    d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20"
                                    stroke="current"
                                    class="stroke-orange"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                ></path>
                                <path
                                    d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                    stroke="current"
                                    class="stroke-orange"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                ></path>
                            </g>
                        </svg>
                        <div
                            class="flex flex-col justify-between p-4 leading-normal"
                        >
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                            >
                                Utilisateurs
                            </h5>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ props.user_count }}
                            </p>
                        </div>
                    </Link>
                </div>
                <!-- roles -->
                <div>
                    <Link
                        :href="route('roles.index')"
                        class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                    >
                        <svg
                            fill="current"
                            class="fill-orange"
                            xmlns="http://www.w3.org/2000/svg"
                            width="90px"
                            height="90px"
                            viewBox="0 0 100 100"
                            enable-background="new 0 0 100 100"
                            xml:space="preserve"
                        >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g
                                id="SVGRepo_tracerCarrier"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M44,63.3c0-3.4,1.1-7.2,2.9-10.2c2.1-3.7,4.5-5.2,6.4-8c3.1-4.6,3.7-11.2,1.7-16.2c-2-5.1-6.7-8.1-12.2-8 s-10,3.5-11.7,8.6c-2,5.6-1.1,12.4,3.4,16.6c1.9,1.7,3.6,4.5,2.6,7.1c-0.9,2.5-3.9,3.6-6,4.6c-4.9,2.1-10.7,5.1-11.7,10.9 c-1,4.7,2.2,9.6,7.4,9.6h21.2c1,0,1.6-1.2,1-2C45.8,72.7,44,68.1,44,63.3z M64,48.3c-8.2,0-15,6.7-15,15s6.7,15,15,15s15-6.7,15-15 S72.3,48.3,64,48.3z M66.6,64.7c-0.4,0-0.9-0.1-1.2-0.2l-5.7,5.7c-0.4,0.4-0.9,0.5-1.2,0.5c-0.5,0-0.9-0.1-1.2-0.5 c-0.6-0.6-0.6-1.7,0-2.5l5.7-5.7c-0.1-0.4-0.2-0.7-0.2-1.2c-0.2-2.6,1.9-5,4.5-5c0.4,0,0.9,0.1,1.2,0.2c0.2,0,0.2,0.2,0.1,0.4 L66,58.9c-0.2,0.1-0.2,0.5,0,0.6l1.7,1.7c0.2,0.2,0.5,0.2,0.7,0l2.5-2.5c0.1-0.1,0.4-0.1,0.4,0.1c0.1,0.4,0.2,0.9,0.2,1.2 C71.6,62.8,69.4,64.9,66.6,64.7z"
                                ></path>
                            </g>
                        </svg>
                        <div
                            class="flex flex-col justify-between p-4 leading-normal"
                        >
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                            >
                                Roles
                            </h5>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ props.materiel_count }}
                            </p>
                        </div>
                    </Link>
                </div>
                <!-- permissions -->
                <div>
                    <Link
                        :href="route('permissions.index')"
                        class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="90px"
                            height="90px"
                            viewBox="0 0 100 100"
                            enable-background="new 0 0 100 100"
                            xml:space="preserve"
                            fill="current"
                            class="fill-orange"
                        >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g
                                id="SVGRepo_tracerCarrier"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></g>
                            <g id="SVGRepo_iconCarrier">
                                <g display="none">
                                    <path
                                        display="inline"
                                        opacity="0.2"
                                        enable-background="new"
                                        d="M84.6,0H80H20h-6.2H0v100h13h7h60h7.3H100V0 H84.6z M20,80V20h60v60H20z"
                                    ></path>
                                </g>
                                <g display="none">
                                    <rect
                                        x="20.1"
                                        y="20.1"
                                        display="inline"
                                        fill="none"
                                        stroke-width="0.25"
                                        stroke-miterlimit="10"
                                        width="59.8"
                                        height="59.8"
                                    ></rect>
                                </g>
                                <g display="none">
                                    <g display="inline" opacity="0.5">
                                        <line
                                            fill="none"
                                            stroke-width="0.25"
                                            stroke-miterlimit="10"
                                            x1="79.9"
                                            y1="20.1"
                                            x2="20.1"
                                            y2="79.9"
                                        ></line>
                                        <line
                                            fill="none"
                                            stroke-width="0.25"
                                            stroke-miterlimit="10"
                                            x1="20.1"
                                            y1="20.1"
                                            x2="79.9"
                                            y2="79.9"
                                        ></line>
                                        <g>
                                            <rect
                                                x="20.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="22.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="24.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="26.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="28.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="30.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="32.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="34.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="36.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="38.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="40"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="42"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="44"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="46"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="48"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="50"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="52"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="54"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="56"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="58"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="60"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="62"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="63.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="65.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="67.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="69.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="71.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="73.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="75.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                            <rect
                                                x="20.1"
                                                y="77.9"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="59.8"
                                                height="2"
                                            ></rect>
                                        </g>
                                        <g>
                                            <rect
                                                x="20.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="22.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="24.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="26.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="28.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="30.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="32.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="34.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="36.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="38.1"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="40"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="42"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="44"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="46"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="48"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="50"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="52"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="54"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="56"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="58"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="60"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="62"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="63.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="65.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="67.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="69.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="71.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="73.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="75.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                            <rect
                                                x="77.9"
                                                y="20.1"
                                                fill="none"
                                                stroke-width="0.25"
                                                stroke-miterlimit="10"
                                                width="2"
                                                height="59.8"
                                            ></rect>
                                        </g>
                                    </g>
                                </g>
                                <path
                                    d="M64.9,47.4c-8.2,0-15,6.7-15,15c0,8.2,6.7,15,15,15s15-6.7,15-15S73.1,47.4,64.9,47.4z M72.2,60.5l-2.8,2.8 c-0.3,0.3-0.4,0.6-0.4,0.8l0.7,4.2c0.2,1.2-0.9,0.5-0.9,0.5L65.4,67c-0.5-0.3-1,0-1,0l-3.5,1.8c-0.9,0.5-0.9,0-0.9-0.4l0.7-3.9 c0.1-0.8-0.3-1.1-0.3-1.2l-2.5-2.4l-0.3-0.3c-0.3-0.3-0.5-0.8,0.6-1l3.5-0.5c0.5-0.1,0.8-0.3,0.9-0.5l1.9-3.9 c0.1-0.3,0.5-0.6,0.9,0.2l1.9,3.8c0.1,0.2,0.4,0.3,0.6,0.4h0.3l3.7,0.5H72C72.2,59.7,72.9,59.9,72.2,60.5z"
                                ></path>
                                <path
                                    d="M48.9,77.2c1,0,1.6-1.2,1-2c-3.2-3.6-5-8.2-5-13c0-3.4,1.1-7.2,2.9-10.2c2.1-3.6,4.5-5.1,6.4-7.9 c3.1-4.6,3.7-11.2,1.7-16.2c-2-5.1-6.7-8.1-12.2-8s-10,3.5-11.7,8.6c-2,5.6-1.1,12.4,3.4,16.6c1.9,1.7,3.5,4.4,2.6,7 c-0.2,0.5-0.8,1.3-2.2,1.9c-5.7,2.5-11.5,5.5-14.1,9.7c-0.5,0.8-1.5,2.8-1.6,5.6l0,0c0,0.7,0,1.3,0.1,2.2c0,0.4,0,0.4,0.1,0.8 c0.3,1.7,1.3,3.2,2.8,4.1c0.6,0.3,2,0.8,4.7,0.8H48.9z"
                                ></path>
                            </g>
                        </svg>
                        <div
                            class="flex flex-col justify-between p-4 leading-normal"
                        >
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                            >
                                Permissions
                            </h5>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ props.salle_count }}
                            </p>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
        <!-- user list -->
        <h2 class="md:text-2xl max-md:text-sm text-green font-medium">
            Liste d'utilisateurs
        </h2>
        <section class="bg-gray-50 p-3">
            <div class="mx-auto max-w-screen-xl px-4">
                <!-- Start coding here -->
                <div
                    class="bg-white relative shadow-md sm:rounded-lg overflow-hidden"
                >
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                    >
                        <div class="w-full md:w-1/2">
                            <!-- search form -->
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only"
                                    >Search</label
                                >
                                <div class="relative w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500"
                                            fill="currentColor"
                                            viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                        placeholder="Search"
                                        required=""
                                    />
                                </div>
                            </form>
                        </div>
                        <!-- add button -->
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                        >
                            <button
                                type="button"
                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2"
                            >
                                <svg
                                    class="h-3.5 w-3.5 mr-2"
                                    fill="currentColor"
                                    viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                >
                                    <path
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    />
                                </svg>
                                Add user
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50"
                            >
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nom</th>
                                    <th scope="col" class="px-4 py-3">
                                        Prenom
                                    </th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Roles</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="border-b"
                                    v-for="i in props.userList"
                                    :key="i.id"
                                >
                                    <th
                                        scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ i.nom }}
                                    </th>
                                    <td class="px-4 py-3">{{ i.prenom }}</td>
                                    <td class="px-4 py-3">{{ i.email }}</td>
                                    <td class="px-4 py-3">
                                        <span
                                            v-for="j in i.roles"
                                            :key="j.id"
                                            >{{ j.name }}</span
                                        >
                                    </td>
                                    <td
                                        class="py-3 flex items-center justify-center gap-x-4"
                                    >
                                        <Link
                                            class="text-blue"
                                            :href="route('users.edit', i.id)"
                                            >Edit</Link
                                        >
                                        <Link
                                            class="text-red-600"
                                            :href="route('users.destroy', i.id)"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
