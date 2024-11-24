<script setup>
import { onMounted } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
const props = defineProps({
    materiel: Object,
    image: String,
    salle:Object,
    placard: Object,
    etagere : Object,
});
onMounted(() => {
    console.log(props);
});
const deleteRecord = (id) => {
    router.delete(`/materiels/${id}`);
    
};
</script>
<template>
    <Head title="Materiels" />
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
            <div class="bg-beige px-3 flex flex-col items-center md:flex-row rounded-lg pt-2 pb-3 ml-20 mt-2 justify-center">
                <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row -mx-4">
                        <div class="md:flex-1 px-4 md:w-1/2">
                            <div v-if="props.image" class="h-[460px] rounded-lg bg-gray-300 mb-4">
                                <img
                                    class="w-full h-full object-cover"
                                    :src="props.image"
                                    alt="Product Image"
                                />
                            </div>
                            <div v-if="!props.image" class="h-[460px] rounded-lg bg-gray-300 mb-4">
                                <img
                                    class="w-full h-full object-cover"
                                    src="https://img.freepik.com/free-vector/removing-goods-from-basket-refusing-purchase-changing-decision-item-deletion-emptying-trash-online-shopping-app-laptop-user-cartoon-character_335657-2566.jpg?t=st=1732474266~exp=1732477866~hmac=7279331359ba84055198f952d7b8f4df4f392ef702ecf6f6700c6be5cb68781a&w=740"
                                    alt="Product Image"
                                />
                            </div>
                            <div class="flex -mx-2 mb-4 justify-around">
                                <div class="px-2">
                                    <Link
                                        :href="route('materiels.edit', props.materiel.id)"
                                        class="w-full bg-blue text-white py-2 px-4 rounded-full font-bold"
                                    >
                                        Edit
                                    </Link>
                                </div>
                                <div class="px-2">
                                    <a
                                        @click="deleteRecord(props.materiel.id)"
                                        class="w-full bg-red-600 text-white py-2 px-4 rounded-full font-bold cursor-pointer"
                                    >
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex-1 px-4 md:w-2/3 ">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                                {{ props.materiel.designation }}
                            </h2>
                            <p class="text-gray-600 text-md mb-2">
                                Index FP VF : {{ props.materiel.index_FP_VF }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Etablissement : {{ props.materiel.etablissement }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Bloc : {{ props.materiel.bloc }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Service : {{ props.materiel.service }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Nom de responsable : {{ props.materiel.nom_responsable }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                CAB : {{ props.materiel.cab }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Famille : {{ props.materiel.famille }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Sous Famille : {{ props.materiel.sous_famille }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Quantite : {{ props.materiel.quantite }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Prix Unitaire : {{ props.materiel.prix_unitaire }}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Marque : {{ props.materiel.marque }} 
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Modele : {{ props.materiel.modele}}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Numero de serie : {{ props.materiel.num_serie}}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Dimensions : {{ props.materiel.dimensions}}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Etat : {{ props.materiel.etat}}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Date d'achat : {{ props.materiel.date_achat}}
                            </p>
                            <p class="text-gray-600 text-md mb-2">
                                Localisation : Salle : {{ props.salle.nom_salle}} Placard : {{ props.placard.num_placard }} Etagere : {{ props.etagere.num_etagere }}
                            </p>
                            
                            
                            <div>
                                <span class="font-bold text-gray-700"
                                    >Commentaires:</span
                                >
                                <p class="text-gray-600 text-md mt-2">
                                    {{ props.materiel.commentaire }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
