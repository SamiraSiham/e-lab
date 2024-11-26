<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from "@inertiajs/vue3";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import Header from "@/Components/Dashboard/Header.vue";
import Schedule from "@/Components/Dashboard/Schedule.vue";
import { onMounted } from "vue";
const props = defineProps({
    user_count: Number,
    materiel_count: Number,
    salle_count: Number,
    events: Array,
});
onMounted(() => {
    console.log(props);
});
</script>

<template>
    <Head title="Dashboard" />
    <Sidebar />
    <Header />
    <div class="bg-white mx-20 py-5 font-Aldrich">
        <h1 class="md:text-3xl max-md:text-sm text-green font-medium">
            Bonjour {{ $page.props.auth.user.prenom }}
            {{ $page.props.auth.user.nom }}
        </h1>
        <div class="w-full flex justify-around py-3">
            <!-- utilisateurs -->
            <div>
                <a
                    href="#"
                    class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                >
                    <svg
                        width="90px"
                        height="90px"
                        viewBox="0 0 16 16"
                        fill="current"
                        xmlns="http://www.w3.org/2000/svg"
                        stroke="current"
                        class="stroke-orange"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"
                                fill="current"
                                class="fill-orange"
                            ></path>
                            <path
                                d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"
                                fill="current"
                                class="fill-orange"
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
                </a>
            </div>
            <!-- materiel -->
            <div>
                <a
                    href="#"
                    class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                >
                    <svg
                        fill="current"
                        class="fill-orange"
                        height="90px"
                        width="90px"
                        version="1.1"
                        id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 470 470"
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
                                d="M462.5,0H7.5C3.357,0,0,3.358,0,7.5S3.357,15,7.5,15h145v15.356c-41.987,3.804-75,39.182-75,82.144v208.397l-9.914-12.746 c-2.543-3.269-7.255-3.857-10.524-1.315c-3.27,2.543-3.858,7.255-1.315,10.525l23.336,30c0.014,0.018,0.031,0.034,0.045,0.052 c0.147,0.186,0.303,0.363,0.467,0.534c0.023,0.024,0.044,0.051,0.068,0.075c0.192,0.195,0.395,0.38,0.608,0.553 c0.025,0.02,0.051,0.037,0.076,0.057c0.184,0.146,0.375,0.284,0.573,0.413c0.057,0.037,0.115,0.07,0.173,0.105 c0.172,0.105,0.348,0.205,0.529,0.297c0.066,0.033,0.132,0.065,0.199,0.096c0.179,0.084,0.362,0.161,0.549,0.231 c0.069,0.026,0.138,0.052,0.207,0.076c0.19,0.065,0.384,0.121,0.58,0.17c0.069,0.018,0.137,0.038,0.207,0.053 c0.205,0.046,0.414,0.08,0.625,0.108c0.063,0.009,0.124,0.021,0.187,0.029c0.271,0.03,0.546,0.048,0.825,0.048 c0.289-0.001,0.557-0.018,0.823-0.047c0.074-0.008,0.147-0.023,0.221-0.034c0.198-0.027,0.393-0.059,0.586-0.102 c0.082-0.018,0.163-0.042,0.244-0.063c0.181-0.047,0.361-0.098,0.536-0.157c0.084-0.029,0.166-0.06,0.249-0.091 c0.169-0.064,0.335-0.134,0.499-0.21c0.083-0.039,0.165-0.077,0.247-0.119c0.159-0.081,0.313-0.169,0.465-0.261 c0.078-0.047,0.157-0.092,0.234-0.142c0.16-0.105,0.313-0.218,0.464-0.334c0.06-0.046,0.124-0.088,0.183-0.137 c0.2-0.164,0.391-0.337,0.573-0.52c0.061-0.062,0.116-0.129,0.176-0.193c0.122-0.132,0.242-0.265,0.354-0.406 c0.022-0.028,0.048-0.052,0.07-0.08l23.332-30c2.543-3.27,1.954-7.982-1.315-10.525c-3.271-2.542-7.983-1.954-10.524,1.316 L92.5,320.899V159.847C107.441,181.084,132.119,195,160,195s52.559-13.916,67.5-35.153v107.91c0,42.961,33.013,78.34,75,82.144 v15.356H270c-3.82,0-7.03,2.872-7.454,6.669l-10,89.743c-0.236,2.121,0.442,4.242,1.865,5.832c1.423,1.59,3.455,2.499,5.589,2.499 h100.02c4.143,0,7.5-3.358,7.5-7.5c0-0.475-0.044-0.938-0.128-1.389l-9.938-89.185c-0.424-3.797-3.634-6.669-7.454-6.669h-32.5 V349.9c41.987-3.804,75-39.182,75-82.144V15h70c4.143,0,7.5-3.358,7.5-7.5S466.643,0,462.5,0z M351.618,455h-83.236l8.329-74.743 h66.578L351.618,455z M160,180c-37.22,0-67.5-30.28-67.5-67.5c0-34.684,26.298-63.329,60-67.073v15.117 c-25.407,3.651-45,25.554-45,51.956c0,28.949,23.552,52.5,52.5,52.5c22.178,0,42.064-14.063,49.487-34.993 c1.385-3.904-0.657-8.191-4.562-9.576c-3.903-1.384-8.191,0.658-9.575,4.562C190.046,139.951,175.84,150,160,150 c-20.678,0-37.5-16.822-37.5-37.5S139.322,75,160,75c15.84,0,30.046,10.049,35.351,25.007c1.384,3.904,5.671,5.944,9.575,4.562 c3.904-1.385,5.946-5.672,4.562-9.576C202.913,76.456,186.56,63.314,167.5,60.55V45.427c33.702,3.744,60,32.389,60,67.073 C227.5,149.72,197.22,180,160,180z M317.5,334.83v-15.123c19.06-2.765,35.413-15.906,41.987-34.444 c1.385-3.904-0.657-8.191-4.562-9.576c-3.903-1.384-8.191,0.659-9.575,4.562c-5.305,14.958-19.511,25.007-35.351,25.007 c-20.678,0-37.5-16.822-37.5-37.5s16.822-37.5,37.5-37.5c15.84,0,30.046,10.049,35.351,25.007c1.384,3.904,5.672,5.946,9.575,4.562 c3.904-1.385,5.946-5.672,4.562-9.576c-7.423-20.931-27.31-34.993-49.487-34.993c-28.948,0-52.5,23.551-52.5,52.5 c0,26.402,19.593,48.304,45,51.956v15.117c-33.702-3.744-60-32.389-60-67.073c0-37.22,30.28-67.5,67.5-67.5s67.5,30.28,67.5,67.5 C377.5,302.441,351.202,331.086,317.5,334.83z M377.5,220.41c-14.941-21.237-39.619-35.153-67.5-35.153s-52.559,13.916-67.5,35.153 V112.5c0-42.961-33.013-78.34-75-82.144V15h210V220.41z"
                            ></path>
                        </g>
                    </svg>
                    <div
                        class="flex flex-col justify-between p-4 leading-normal"
                    >
                        <h5
                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                        >
                            Materiel
                        </h5>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ props.materiel_count }}
                        </p>
                    </div>
                </a>
            </div>
            <!-- salles -->
            <div>
                <a
                    href="#"
                    class="flex flex-col items-center bg-beige border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100"
                >
                    <svg
                        width="90px"
                        height="90px"
                        viewBox="0 0 48 48"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="current"
                        class="fill-orange"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g
                            id="SVGRepo_iconCarrier"
                            class="fill-none stroke-orange"
                        >
                            <rect
                                class="a"
                                x="4.5"
                                y="8.4"
                                width="39"
                                height="31.2"
                                rx="2"
                            ></rect>
                            <rect
                                class="a"
                                x="8.5"
                                y="12.4"
                                width="31"
                                height="23.2"
                                rx="1"
                            ></rect>
                            <rect
                                class="a"
                                x="29.68"
                                y="33.41"
                                width="6.62"
                                height="2.19"
                            ></rect>
                            <path
                                class="a"
                                d="M25.84,19a2.6,2.6,0,0,0-3.68,0l0,0a2.61,2.61,0,1,0,4.46,1.86A2.54,2.54,0,0,0,25.82,19Z"
                            ></path>
                            <path
                                class="a"
                                d="M22,25.53h4a3,3,0,0,1,3,3v1.21a0,0,0,0,1,0,0H19a0,0,0,0,1,0,0V28.53A3,3,0,0,1,22,25.53Z"
                            ></path>
                            <path
                                class="a"
                                d="M17.42,21.47a2,2,0,0,0-2.84,0l0,0A2,2,0,1,0,18,22.91a2,2,0,0,0-.6-1.43Z"
                            ></path>
                            <path
                                class="a"
                                d="M19.34,27.14a2,2,0,0,0-1.47-.65H14.13a2,2,0,0,0-2,2v1.25H19"
                            ></path>
                            <path
                                class="a"
                                d="M33.42,21.47a2,2,0,0,0-2.84,0l0,0A2,2,0,1,0,34,22.91a2,2,0,0,0-.6-1.43Z"
                            ></path>
                            <path
                                class="a"
                                d="M29,29.74h6.86V28.49a2,2,0,0,0-2-2H30.13a2,2,0,0,0-1.47.65"
                            ></path>
                        </g>
                    </svg>
                    <div
                        class="flex flex-col justify-between p-4 leading-normal"
                    >
                        <h5
                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                        >
                            Salles
                        </h5>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ props.salle_count }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
            <!-- schedule -->
            <Schedule :events="props.events"/>
    </div>
</template>
