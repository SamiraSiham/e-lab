<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "@/Components/Welcome/Header.vue";
import Navbar from "@/Components/Welcome/Navbar.vue";
import Hero from "@/Components/Welcome/Hero.vue";
import Advantages from "@/Components/Welcome/Advantages.vue";
import Footer from "@/Components/Welcome/Footer.vue";
</script>
<template>
    <Head title="Accueil" />
    <div class="font-Aldrich">
        <Header />
        <Navbar />
        <Hero />
        <Advantages />
        <Footer />
    </div>
</template>
