<script setup>
import { Link } from "@inertiajs/vue3";
import homeIcon from "../images/ens.png";
import salleIcon from "../icons/dashboard/stock_icon.png";
import placardIcon from "../icons/dashboard/placard_icon.png";
import moduleIcon from "../icons/dashboard/module_icon.png";
import materielIcon from "../icons/dashboard/materiel_icon.png";
import etagereIcon from "../icons/dashboard/etagere_icon.png";
import enseignerIcon from "../icons/dashboard/enseigner_icon.png";
import userIcon from "../icons/dashboard/user_icon.png";

const menu = [
    { id: 1, name: "Accueil", icon: homeIcon, route: "/" },
    { id: 2, name: "Modules", icon: moduleIcon, route: "modules.index" },
    { id: 3, name: "Salles", icon: salleIcon, route: "salles.index" },
    {id : 4, name : "Enseignement", icon : enseignerIcon, route : 'enseigner.index'},
    // {id : 5, name : "Placards", icon : placardIcon, route : 'placards.index'},
    // {id : 6, name : "Etageres", icon : etagereIcon, route : 'etageres.index'},
    // {id : 7, name : "Materiels", icon : materielIcon, route : 'materiels.index'},
    // {id : 8, name : "Profile", icon : userIcon, route : 'profile.index'},
];
</script>
<template>
    <div
        class="fixed top-0 left-0 min-h-screen w-16 m-0 z-50 flex flex-col bg-beige"
    >
        <!-- <h1>test</h1> -->
        <div v-for="i in menu" :key="i.id">
            <Link :href="route(i.route)">
                <div class="sidebar_icons group">
                    <img :src="i.icon" :alt="i.name" />
                    <span
                        class="sidebar-tooltip group-hover:scale-100 text-lg"
                    >
                        {{ i.name }}
                    </span>
                </div>
            </Link>
        </div>
    </div>
</template>
