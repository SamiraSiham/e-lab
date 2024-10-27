<script setup>
// import GuestLayout from '@/Layouts/GuestLayout.vue';
// import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from "@inertiajs/vue3";
function togglePassword() {
    var x = document.getElementById("password_field");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function togglePasswordConfirmation() {
    var x = document.getElementById("password_confirmation_field");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
const form = useForm({
    nom: "",
    prenom: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="S'inscrire" />
    <!-- <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout> -->
    <section class="bg-gray-300 min-h-screen flex items-center justify-center">
        <div class="bg-white flex rounded-2xl shadow-lg max-w-3xl p-5">
            <div class="sm:w-4/5 px-16 min-w-80">
                <h2 class="font-bold text-2xl text-center text-orange">
                    Inscription
                </h2>
                <form
                    method="POST"
                    class="flex flex-col gap-4"
                    @submit.prevent="submit"
                >
                    <input
                        v-model="form.nom"
                        class="p-2 mt-8 rounded-xl border"
                        type="text"
                        name="nom"
                        placeholder="Nom"
                    />
                    <input
                        v-model="form.prenom"
                        class="p-2 rounded-xl border"
                        type="text"
                        name="prenom"
                        placeholder="Prénom"
                    />
                    <input
                        v-model="form.email"
                        class="p-2 rounded-xl border"
                        type="text"
                        name="email"
                        placeholder="Email"
                    />
                    <div class="relative">
                        <input
                            v-model="form.password"
                            class="p-2 rounded-xl border w-full"
                            type="password"
                            name="password"
                            id="password_field"
                            placeholder="Mot de passe"
                        />
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="gray"
                            @click="togglePassword()"
                            class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"
                            />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"
                            />
                        </svg>
                    </div>
                    <div class="relative">
                        <input
                            v-model="form.password_confirmation"
                            class="p-2 rounded-xl border w-full"
                            type="password"
                            name="password"
                            id="password_confirmation_field"
                            placeholder="Confirmer le mot de passe"
                        />
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="gray"
                            @click="togglePasswordConfirmation()"
                            class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"
                            />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"
                            />
                        </svg>
                    </div>
                    <button class="bg-orange text-white rounded-xl py-2">
                        Créer votre compte
                    </button>
                </form>

                <p class="mt-1 text-sm py-2 text-dark-blue">
                    Vous avez un compte ?
                    <a href="/login" class="underline">Se connecter </a>
                </p>
            </div>

            <div class="w-1/2 flex flex-col items-center justify-center">
                <img
                    class="sm:block size-72 hidden rounded-2xl"
                    :src="img"
                    alt=""
                />
            </div>
        </div>
    </section>
</template>

<script>
import img from "../../Components/images/ens.png";
export default {
    data() {
        return {
            img: img,
        };
    },
};
</script>
