<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import InputError from "@/Components/InputError.vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
const props = defineProps({
    salles: Object,
});
onMounted(() => {
    console.log(props);
});
const form = useForm({
    num_placard : null,
    salle_id: null,
    type: null,
});
const submit = () => {
    router.post("/placards", form);
};
</script>
<template>
    <Head title="Placard" />
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
                    Ajouter un Placard
                </h1>
                <form
                    class="bg-orange p-5 text-white rounded-lg w-[85%] my-7"
                    @submit.prevent="submit"
                >
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <!-- Salle -->
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-md font-medium text-white"
                                >Salle</label
                            >

                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                v-model="form.salle_id"
                            >
                                <option :selected="true" :value="null">
                                    Choisissez une salle
                                </option>
                                <option
                                    v-for="i in props.salles"
                                    :key="i.id"
                                    :value="i.id"
                                >
                                    {{ i.nom_salle }}
                                </option>
                            </select>
                            <InputError class="mt-1" :message="form.errors.salle_id" />
                        </div>
                        <!-- Numero Placard -->
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-md font-medium text-white"
                                >Numero de placard</label
                            >

                            <input
                                type="text"
                                id="num_placard"
                                v-model="form.num_placard"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                            <InputError class="mt-1" :message="form.errors.module_id" />
                        </div>
                    </div>
                    <!-- Type -->
                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-md font-medium text-white"
                            >Type</label
                        >

                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                            v-model="form.type"
                        >
                            <option :selected="true" :value="null">
                                Choisissez un type
                            </option>
                            <option :value="`vertical`">vertical</option>
                            <option :value="`horizontal`">horizontal</option>
                        </select>
                        <InputError class="mt-1" :message="form.errors.type" />
                    </div>


                    <!-- Buttons here (DO NOT TOUCH) -->
                    <div class="flex md:gap-x-3 max-md:flex-col max-md:gap-y-2">
                        <button
                            type="submit"
                            class="text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Ajouter
                        </button>
                        <Link
                            :href="route('placards.index')"
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
