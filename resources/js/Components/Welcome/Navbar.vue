<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, getCurrentInstance, onMounted } from "vue";
let open = ref(false);

function MenuOpen() {
    open.value = !open.value;
}

</script>

<template>
    <nav
        class="bg-[#E8E0D6] w-full md:flex md:items-center lg:items-center md:justify-between"
    >
        <div
            class="flex flex-row items-center justify-between md:w-1/6 md:mx-10"
        >
            <div class="flex flex-col items-center justify-start">
                <img id="navbar_logo_img" class="size-14" :src="Logo" alt="" />
                <span id="navbar_logo_txt" class="text-[#F4874A]">E-Lab</span>
            </div>
            <span
                @click="MenuOpen()"
                class="cursor-pointer size-9 md:hidden block"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="#2A645D"
                    id="hamburger-menu"
                >
                    <path
                        d="M5 7h14c.6 0 1-.4 1-1s-.4-1-1-1H5c-.6 0-1 .4-1 1s.4 1 1 1zm0 6h14c.6 0 1-.4 1-1s-.4-1-1-1H5c-.6 0-1 .4-1 1s.4 1 1 1zm0 6h14c.6 0 1-.4 1-1s-.4-1-1-1H5c-.6 0-1 .4-1 1s.4 1 1 1z"
                    ></path>
                </svg>
            </span>
        </div>

        <div class="md:flex md:flex-row md:justify-between w-5/6">
            <ul
                class="md:flex md:items-center md:justify-between z-[0] md:z-auto md:static absolute w-full md:w-full md:py-0 py-4 md:pl-12 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500"
                :class="[
                    open
                        ? 'top-[120px] opacity-100 bg-[#E8E0D6] justify-center items-center'
                        : '',
                ]"
            >
                <li class="pt-3 text-center">
                    <a
                        class="text-[#2A645D] font-semibold underline mx-6 hover:text-[#f4a46b]"
                        href="/"
                        >Accueil</a
                    >
                </li>
                <li class="pt-3 text-center">
                    <a
                        class="text-[#2A645D] font-semibold underline mx-6 hover:text-[#f4a46b]"
                        href="/"
                        >à propos</a
                    >
                </li>
                <li class="pt-3 text-center">
                    <a
                        class="text-[#2A645D] font-semibold underline mx-6 hover:text-[#f4a46b]"
                        href="/dashboard/salles"
                        >Logiciel d'inventaire</a
                    >
                </li>
                <div
                    class="p-2 pt-3 md:mx-10 flex flex-row justify-center"
                >
                    <Link
                        :href="route('login')"
                        class="bg-orange align-middle text-center rounded-full hover:bg-[#2A645D] p-2 text-white"
                    >
                        <span class="flex flex-row items-center"
                            >Se connecter
                            <span class="px-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="white"
                                    width="15"
                                    height="15"
                                    viewBox="0 0 20 20"
                                    id="chevron"
                                >
                                    <path
                                        d="M13.25 10 6.109 2.58a.697.697 0 0 1 0-.979.68.68 0 0 1 .969 0l7.83 7.908a.697.697 0 0 1 0 .979l-7.83 7.908a.68.68 0 0 1-.969 0 .697.697 0 0 1 0-.979L13.25 10z"
                                    ></path>
                                </svg>
                            </span>
                        </span>
                    </Link>
                </div>
                
            </ul>
        </div>
    </nav>
</template>

<script>
import Logo from "../images/ens.png";
import { ref } from "vue";
export default {
    data() {
        return {
            Logo: Logo,
        };
    },
};
</script>