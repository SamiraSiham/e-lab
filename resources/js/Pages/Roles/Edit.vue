<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Header from "@/Components/Dashboard/Header.vue";
import Sidebar from "@/Components/Dashboard/Sidebar.vue";
import InputError from "@/Components/InputError.vue";
import Multiselect from "vue-multiselect";
import { onMounted } from "vue";
import { watch } from "vue";
const props = defineProps({
    role: Object,
    permissions: Array,
});
const form = useForm({
    name: props.role.name,
    permissions: [],
});
onMounted(() => {
    form.permissions = props.role.permissions;
});
watch(
    () => props.role,
    () => (form.permissions = props.role.permissions)
);
const submit = () => {
    form.put(route("roles.update", props.role.id));
};
</script>
<template>
    <Head title="Edit Role" />
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
                    Modifier un role
                </h1>
                <form
                    class="bg-orange p-5 text-white rounded-lg w-[85%] my-7"
                    @submit.prevent="submit"
                >
                    <div
                        class="flex flex-row max-md:flex-col items-center justify-center"
                    >
                        <div class="my-6 w-full">
                            <label
                                for="name"
                                class="block mb-2 text-lg font-medium text-white"
                                >Nom de role :</label
                            >
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>
                    </div>
                    <!-- permissions multiselect -->
                    <div class="mb-6">
                        <label class="typo__label">Permissions</label>
                        <multiselect
                            v-model="form.permissions"
                            :options="permissions"
                            :multiple="true"
                            :close-on-select="false"
                            :clear-on-select="false"
                            placeholder="Pick some"
                            label="name"
                            track-by="id"
                            :preselect-first="false"
                        >
                        </multiselect>
                    </div>
                    <!-- Buttons -->
                    <div
                        class="flex md:gap-x-4 max-md:flex-col max-md:gap-y-2 justify-center"
                    >
                        <button
                            type="submit"
                            class="text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Modifier
                        </button>
                        <Link
                            :href="route('roles.index')"
                            class="text-white bg-blue hover:bg-white hover:text-blue border border-blue font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Annuler
                        </Link>
                    </div>
                </form>
                <!-- acquired permission table -->
                <div class="flex items-center justify-center w-2/3">
                    <div class="md:w-full">
                        <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500"
                            >
                                <thead
                                    class="text-xs text-white uppercase bg-green"
                                >
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            Permission
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b"
                                        v-for="i in props.role.permissions"
                                        :key="i.id"
                                    >
                                        <th
                                            scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"
                                        >
                                            {{ i.name }}
                                        </th>

                                        <td class="py-3 px-4">
                                            <Link
                                                class="text-red-600"
                                                :href="
                                                    route(
                                                        'roles.permissions.destroy',
                                                        [props.role.id, i.id]
                                                    )
                                                "
                                                method="delete"
                                                as="button"
                                                >Revoke</Link
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
