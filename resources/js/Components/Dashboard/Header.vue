<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div id="header_container" class="h-11 bg-orange flex justify-end">
        <Link
            :href="route('logout')"
            method="post"
            as="button"
            class="text-[#FF0000] max-md:text-sm flex flex-row items-center gap-x-2 px-5"
        >
            Deconnexion
            <!-- <img :src="logout" class="size-2/3" alt="" /> -->
            <i class="fa-solid text-[#FF0000] fa-arrow-right-from-bracket"></i>
        </Link>
    </div>
</template>
