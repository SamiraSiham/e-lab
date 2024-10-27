<script setup>
// import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
// import GuestLayout from "@/Layouts/GuestLayout.vue";
// import InputLabel from "@/Components/InputLabel.vue";
// import PrimaryButton from "@/Components/PrimaryButton.vue";
// import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
function togglePassword() {
    var x = document.getElementById("password_field");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Se connecter" />
    <!-- <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
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
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout> -->
    <section class="bg-gray-300 min-h-screen flex items-center justify-center">
        <div class="bg-white flex rounded-2xl shadow-lg w-2xl p-8">
            <div class="sm:w-4/5 px-16 min-w-80">
                <h2 class="font-bold text-3xl text-center text-orange">
                    Login
                </h2>
                <form class="flex flex-col gap-4" @submit.prevent="submit">
                    <input
                        required
                        class="p-2 mt-8 rounded-xl border"
                        type="text"
                        name="email"
                        placeholder="Email"
                        v-model="form.email"
                    />
                    <div class="relative">
                        <input
                            required
                            class="p-2 rounded-xl border w-full"
                            type="password"
                            name="password"
                            id="password_field"
                            placeholder="Password"
                            v-model="form.password"
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
                    <div class="mt-1 py-1 block">
                    <label class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span class="ms-2 text-sm text-gray-600"
                            >Remember me</span
                        >
                    </label>
                </div>
                    <button
                        type="submit"
                        class="bg-orange text-white rounded-xl py-2"
                    >
                        Log in
                    </button>
                </form>
                

                <!-- <p class="mt-1 text-sm py-2 text-[#1f4868]">
                        <a href="/forgotPassword"> Mot de passe oublié ? </a>
                    </p> -->
                <p class="mt-1 text-sm py-1 text-blue">
                    Pas de compte ?
                    <Link :href="route('register')" class="underline"
                        >S'inscrire
                    </Link>
                </p>
                <p class="mt-1 text-sm py-1 text-blue">
                    <Link :href="route('password.request')" class="underline"
                        >Mot de passe oublié ?
                    </Link>
                </p>
            </div>

            <div class="w-1/2 flex flex-col items-center justify-center">
                <img class="sm:block hidden rounded-2xl" :src="img" alt="" />
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
