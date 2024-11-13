<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import InputError from "@/Components/InputError.vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
const props = defineProps({
    salles: Object,
    modules: Object,
    user: Object,
    ens: Object,
});
onMounted(() => {
    console.log(props.ens);
});
const form = useForm({
    _method : "put",
    salle_id: props.ens.salle_id,
    module_id: props.ens.module_id,
    user_id: props.user.id,
    type_cours: props.ens.type_cours,
    date_deroulement: props.ens.date_deroulement,
    heure_debut: props.ens.heure_debut,
    heure_fin: props.ens.heure_fin,
    support: null,
});
const submit = () => {
    router.post(`/enseigner/${props.ens.id}`, form);
};
</script>
<template>
    <Head title="Enseignement" />
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
                    Modifier un Cours / TD / TP Ou Examen
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
                            <InputError
                                class="mt-1"
                                :message="form.errors.salle_id"
                            />
                        </div>
                        <!-- Module -->
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-md font-medium text-white"
                                >Module</label
                            >

                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                v-model="form.module_id"
                            >
                                <option :selected="true" :value="null">
                                    Choisissez un module
                                </option>
                                <option
                                    v-for="i in props.modules"
                                    :key="i.id"
                                    :value="i.id"
                                >
                                    {{ i.nom_module }}
                                </option>
                            </select>
                            <InputError
                                class="mt-1"
                                :message="form.errors.module_id"
                            />
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
                            v-model="form.type_cours"
                        >
                            <option :selected="true" :value="null">
                                Choisissez un type
                            </option>
                            <option :value="`Cours`">Cours</option>
                            <option :value="`TD`">Travaux Dirigés</option>
                            <option :value="`TP`">Travaux Pratiques</option>
                            <option :value="`Examen`">Examen</option>
                        </select>
                        <InputError class="mt-1" :message="form.errors.type" />
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <!-- date picker -->
                        <div>
                            <label
                                for="email"
                                class="block mb-1 text-md font-medium text-white"
                                >Date de deroulement</label
                            >
                            <input
                                datepicker
                                id="default-datepicker"
                                type="date"
                                v-model="form.date_deroulement"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                            />
                            <InputError
                                class="mt-1"
                                :message="form.errors.date_deroulement"
                            />
                        </div>
                        <!-- time pickers -->
                        <div>
                            <div
                                class="max-w-full mx-auto grid grid-cols-2 gap-4 mb-2"
                            >
                                <div>
                                    <label
                                        for="start-time"
                                        class="block mb-2 text-md font-medium text-white"
                                        >Heure Debut</label
                                    >
                                    <div class="relative">
                                        <input
                                            type="time"
                                            id="start-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                            min="08:30"
                                            max="18:00"
                                            value="08:30"
                                            v-model="form.heure_debut"
                                            required
                                        />
                                    </div>
                                    <InputError
                                        class="mt-1"
                                        :message="form.errors.heure_debut"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="end-time"
                                        class="block mb-2 text-md font-medium text-white"
                                        >Heure Fin</label
                                    >
                                    <div class="relative">
                                        <input
                                            type="time"
                                            id="end-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                            min="08:30"
                                            max="18:00"
                                            value="18:00"
                                            required
                                            v-model="form.heure_fin"
                                        />
                                    </div>
                                    <InputError
                                        class="mt-1"
                                        :message="form.errors.heure_fin"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Support -->
                    <div class="mb-6">
                        <label class="mb-1 block text-md font-medium text-white"
                            >Support (facultatif / moins de 100mb)
                        </label>
                        <input
                            @input="form.support = $event.target.files[0]"
                            type="file"
                            class="block w-full text-md file:mr-4 file:rounded-md bg-white text-gray-900 rounded-lg file:border file:bg-blue hover:file:bg-white hover:file:border-blue hover:file:text-blue file:py-2.5 file:px-4 file:text-sm file:font-semibold file:text-white"
                        />
                        <InputError
                            class="mt-1"
                            :message="form.errors.support"
                        />
                    </div>

                    <!-- Buttons here (DO NOT TOUCH) -->
                    <div class="flex md:gap-x-3 max-md:flex-col max-md:gap-y-2">
                        <button
                            type="submit"
                            class="text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Modifier
                        </button>
                        <Link
                            :href="route('enseigner.index')"
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
