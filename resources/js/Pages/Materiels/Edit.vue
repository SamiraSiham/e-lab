<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import InputError from "@/Components/InputError.vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { ref } from "vue";
import axios from "axios";
const props = defineProps({
    materiel : Object,
    salles: Object,
    placards: Object,
    etageres: Object,
    oldimage : String
});
let salles = ref(props.salles);
let placards = ref(props.placards);
let etageres = ref(props.etageres);
const getAvailablePlacards = () => {
    axios
        .get(`/placards/${form.salle_id}`)
        .then((res) => {
            placards.value = res.data.placard;
            console.log(res.data);
            if(res.data.placard.length <= 0){
                etageres.value = [];
            }
        })
        .catch((e) => {
            console.log(e);
        });
};
const getAvailableEtageres = () => {
    axios
        .get(`/etageres/${form.placard_id}`)
        .then((res) => {
            etageres.value = res.data.etagere;
            console.log(res.data.etagere);
        })
        .catch((e) => {
            console.log(e);
        });
};
// onMounted(() => {
//     console.log(props);
// });
var loadFile = function (event) {
    var input = event.target;
    var file = input.files[0];
    var type = file.type;

    var output = document.getElementById("preview_img");

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src); // free memory
    };
    form.image = file;
};
const form = useForm({
    _method : "put",
    index_fp_vf: props.materiel.index_FP_VF,
    cab: props.materiel.cab,
    famille: props.materiel.famille,
    sous_famille: props.materiel.sous_famille,
    designation: props.materiel.designation,
    quantite: props.materiel.quantite,
    prix_unitaire: props.materiel.prix_unitaire,
    marque: props.materiel.marque,
    modele: props.materiel.modele,
    num_serie: props.materiel.num_serie,
    dimensions: props.materiel.dimensions,
    etat: props.materiel.etat,
    date_achat: props.materiel.date_achat,
    commentaire: props.materiel.commentaire,
    image: null,
    salle_id: props.materiel.salle_id,
    placard_id: props.materiel.placard_id,
    etagere_id: props.materiel.etagere_id,
});
const submit = () => {
    router.post(`/materiels/${props.materiel.id}`, form);
};

</script>
<template>
    <Head title="Materiel" />
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
                    Ajouter un Materiel
                </h1>
                <form
                    class="bg-orange p-5 text-white rounded-lg w-[85%] my-7"
                    @submit.prevent="submit"
                >
                    <div class="grid gap-4 sm:gap-6 mb-6 md:grid-cols-2">
                        <!-- index fp vf -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Index FP VF</label
                            >
                            <input
                                type="text"
                                id="num_etagere"
                                v-model="form.index_fp_vf"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- CAB -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >CAB</label
                            >
                            <input
                                type="text"
                                id="cab"
                                v-model="form.cab"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Famille -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Famille</label
                            >
                            <input
                                type="text"
                                id="Famille"
                                v-model="form.famille"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- SOUS FAMILLE -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Sous Famille</label
                            >
                            <input
                                type="text"
                                id="sous_famille"
                                v-model="form.sous_famille"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Designation -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Designation</label
                            >
                            <input
                                type="text"
                                id="Designation"
                                v-model="form.designation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Quantite -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Quantité</label
                            >
                            <input
                                type="number"
                                id="Designation"
                                v-model="form.quantite"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Prix Unitaire -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Prix Unitaire</label
                            >
                            <input
                                type="number"
                                id="PrixUnitaire"
                                v-model="form.prix_unitaire"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Marque -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Marque</label
                            >
                            <input
                                type="text"
                                id="Marque"
                                v-model="form.marque"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Modele -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Modele</label
                            >
                            <input
                                type="text"
                                id="Modele"
                                v-model="form.modele"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Numero de serie -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Numero de serie</label
                            >
                            <input
                                type="number"
                                id="NumeroDeSerie"
                                v-model="form.num_serie"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Dimensions -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Dimensions</label
                            >
                            <input
                                type="text"
                                id="Dimensions"
                                v-model="form.dimensions"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Etat -->
                        <div class="w-full">
                            <label
                                class="block mb-2 text-md font-medium text-white"
                                >Etat</label
                            >
                            <input
                                type="text"
                                id="Etat"
                                v-model="form.etat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <!-- Date Achat -->
                        <div class="w-full">
                            <label
                                class="block mb-1 text-md font-medium text-white"
                                >Date d'achat</label
                            >
                            <input
                                datepicker
                                id="default-datepicker"
                                type="date"
                                v-model="form.date_achat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                            />
                            <InputError
                                class="mt-1"
                                :message="form.errors.date_achat"
                            />
                        </div>
                        <!-- Image -->
                        <div class="w-full flex items-center space-x-6">
                            <div v-if="props.image" class="shrink-0">
                                <img
                                    id="preview_img"
                                    class="h-16 w-16 object-cover rounded-full"
                                    :src="props.oldimage"
                                    alt="Current profile photo"
                                />
                            </div>
                            <div v-if="!props.image" class="shrink-0">
                                <img
                                    id="preview_img"
                                    class="h-16 w-16 object-cover rounded-full"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAup5xsZf9Ms6VufPzqVTHhR7W7HV-gOL-4_cWJmvTFOZRNCGUt4o-eDg&s"
                                    alt="Current profile photo"
                                />
                            </div>
                            <label class="block">
                                <input
                                    type="file"
                                    @change="loadFile($event)"
                                    class="block w-full text-sm text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-green hover:file:bg-violet-100"
                                />
                            </label>
                        </div>
                        <!-- Commentaire -->
                        <div class="sm:col-span-2">
                            <label
                                for="description"
                                class="block mb-1 text-md font-medium text-white"
                                >Commentaire</label
                            >
                            <textarea
                                id="description"
                                rows="8"
                                v-model="form.commentaire"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Your description here"
                            ></textarea>
                        </div>
                    </div>
                    <!-- Localisation -->
                    <div class="grid gap-4 sm:gap-6 mb-6 md:grid-cols-3">
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
                                @change="getAvailablePlacards(form.salle_id)"
                            >
                                <option :selected="true" :value="null">
                                    Choisissez une salle
                                </option>
                                <option
                                    v-for="i in salles"
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
                        <!-- Placard -->
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-md font-medium text-white"
                                >Placard</label
                            >

                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                v-model="form.placard_id"
                                @change="getAvailableEtageres(form.placard_id)"
                            >
                                <option :selected="true" :value="null">
                                    Choisissez un placard
                                </option>
                                <option
                                    v-for="i in placards"
                                    :key="i.id"
                                    :value="i.id"
                                >
                                    {{ i.num_placard }}
                                </option>
                            </select>
                            <InputError
                                class="mt-1"
                                :message="form.errors.placard_id"
                            />
                        </div>
                        <!-- Etagere -->
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-md font-medium text-white"
                                >Etagere</label
                            >

                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5"
                                v-model="form.etagere_id"
                            >
                                <option :selected="true" :value="null">
                                    Choisissez un etagere
                                </option>
                                <option
                                    v-for="i in etageres"
                                    :key="i.id"
                                    :value="i.id"
                                >
                                    {{ i.num_etagere }}
                                </option>
                            </select>
                            <InputError
                                class="mt-1"
                                :message="form.errors.placard_id"
                            />
                        </div>
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
                            :href="route('materiels.index')"
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
