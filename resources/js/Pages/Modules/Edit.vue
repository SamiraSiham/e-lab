<script setup>
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import {defineProps, onMounted } from "vue";
const data = defineProps({
    module: Object,
    errors: Object
});
onMounted(()=>{
    console.log(data.module)
})
const form = useForm({
  num_module: data.module.num_module,
  nom_module: data.module.nom_module,
})
const submit = () => {
    router.put(`/modules/${data.module.id}`, form)
}
</script>
<template>
    <Head title="modules" />
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
                    Modifier un module
                </h1>
                <form
                    class="bg-orange p-5 text-white rounded-lg w-[85%] my-7"
                    @submit.prevent="submit"
                >
                    <div class="flex flex-row max-md:flex-col gap-x-4 items-center justify-between">
                        <div class="my-6 w-1/2 max-md:w-full">
                            <label
                                for="password"
                                class="block mb-2 text-lg font-medium text-white"
                                >Numéro de module</label
                            >
                            <input
                                type="text"
                                id="num_module"
                                v-model="form.num_module"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                        <div class="my-6 w-1/2 max-md:w-full">
                            <label
                                for="password"
                                class="block mb-2 text-lg font-medium text-white"
                                >Nom de module</label
                            >
                            <input
                                type="text"
                                id="nom_module"
                                v-model="form.nom_module"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                    >
                        Modifier
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
