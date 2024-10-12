<script setup></script>

<template>
  <section class="bg-[#2A645D] md:bg-white h-full flex flex-row flex-wrap w-full pt-6 px-5">
    <div class="flex flex-col w-full lg:w-2/3 h-96 justify-center items-center sm:border-0">
      <!-- title 1 -->
      <div class=" flex flex-col justify-center ">
        <h1 class="text-[#F4874A] text-4xl text-center">
          Gérez votre laboratoire avec précision et simplicité!
        </h1>
      </div>
      <!-- title 2 -->
      <div class="mt-10 flex flex-row items-center justify-center">
        <h2 class="text-white md:text-[#001878] text-2xl w-2/3 text-center">
          Système de gestion d’inventaire de laboratoire
        </h2>
      </div>
    </div>
    <!-- image -->
    <div class="w-full flex justify-center lg:w-1/3 lg:flex lg:justify-center">
      <img :src="ens" class="justify-center" alt="" />
    </div>
  </section>
</template>

<script>
import ens from "../images/ens.png";
export default {
  data() {
    return {
      ens: ens,
    };
  },
};
</script>
