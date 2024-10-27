<script setup>
import { useForm } from '@inertiajs/vue3';
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
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
  <section class="bg-gray-300 min-h-screen flex items-center justify-center">
    <div class="bg-white flex rounded-2xl shadow-lg max-w-3xl p-5">
      <div class="sm:w-4/5 px-16 min-w-80">
        <h2 class="font-bold text-2xl text-center text-light-orange">Login</h2>
        <form class="flex flex-col gap-4" @submit.prevent="login">
          <input
            required
            class="p-2 mt-8 rounded-xl border"
            type="text"
            name="email"
            placeholder="Email"
            v-model="model.User.email"
          />
          <div class="relative">
            <input
              required
              class="p-2 rounded-xl border w-full"
              type="password"
              name="password"
              id="password_field"
              placeholder="Password"
              v-model="model.User.password"
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
          <button type="submit" class="bg-[#f3884d] text-white rounded-xl py-2">
            Log in
          </button>
        </form>

        <!-- <p class="mt-1 text-sm py-2 text-[#1f4868]">
          <a href="/forgotPassword"> Mot de passe oublié ? </a>
        </p> -->
        <p class="mt-1 text-sm py-2 text-[#1f4868]">
          Pas de compte ?
          <a href="/register" class="underline">S'inscrire </a>
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
import axios from "axios";
export default {
  data() {
    return {
      img: img,
      model: {
        User: {
          email: "",
          password: "",
        },
      },
    };
  },
  methods: {
    login() {
      // console.log(this.model.User);

      axios
        .post(`http://127.0.0.1:8000/api/login`, {
          email: this.model.User.email,
          password: this.model.User.password,
        })
        .then((res) => {
          // console.log(res);
          localStorage.setItem('token', res.data.token);
          this.$router.push('/dashboard/salles');
        })
        .catch((e) => {
          // console.log(e.response.status);
          if(e.response.status == 401){
            alert("Email ou mot de passe incorrect");
          }
        });
    },
  },
};
</script>
