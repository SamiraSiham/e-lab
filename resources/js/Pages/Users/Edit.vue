<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import { onMounted } from "vue";
const props = defineProps({
    user : Object
})
onMounted(()=>{
    console.log(props.user)
})
const form = useForm({
    nom : props.user.nom,
    prenom : props.user.prenom,
    email : props.user.email,
    terms : false,
});
const submit = () => {
    form.put(route('users.update', props.user.id));
};
</script>
<template>
    <Head title="Users" />
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
                class="bg-beige px-3 flex flex-col items-center rounded-lg pt-2 pb-3 ml-20 mt-2 justify-center"
            >
                <h1 class="text-green text-2xl font-semibold">
                    Modifier un utilisateur
                </h1>
                <form
                    class="bg-orange p-5 text-white rounded-lg w-[85%] my-7"
                    @submit.prevent="submit"
                >
                    <div
                        class="flex flex-row max-md:flex-col gap-x-4 items-center justify-between"
                    >
                        <div class="my-6 w-1/2 max-md:w-full">
                            <label
                                for="nom"
                                class="block mb-2 text-lg font-medium text-white"
                                >Nom</label
                            >
                            <input
                                type="text"
                                id="nom"
                                v-model="form.nom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                            <div v-if="form.errors.nom" class="text-red-600">
                                {{ form.errors.nom }}
                            </div>
                        </div>
                        <div class="my-6 w-1/2 max-md:w-full">
                            <label
                                for="nom"
                                class="block mb-2 text-lg font-medium text-white"
                                >Prenom</label
                            >
                            <input
                                type="text"
                                id="prenom"
                                v-model="form.prenom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                            <div v-if="form.errors.prenom" class="text-red-600">
                                {{ form.errors.prenom }}
                            </div>
                        </div>

                    </div>
                    <div
                        class="flex flex-row max-md:flex-col gap-x-4 items-center justify-between"
                    >
                        <div class="my-6 w-full">
                            <label
                                for="email"
                                class="block mb-2 text-lg font-medium text-white"
                                >Email</label
                            >
                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-600">
                                {{ form.errors.email }}
                            </div>
                        </div>
                    </div>

                    <div class="flex md:gap-x-3 max-md:flex-col">
                        <button
                            type="submit"
                            class="text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Ajouter
                        </button>
                        <Link
                            :href="route('users.index')"
                            class="text-white bg-blue hover:bg-white hover:text-blue border border-blue font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Annuler
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
