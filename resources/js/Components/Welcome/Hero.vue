<script setup></script>

<template>
  <section class="bg-green md:bg-white max-md:h-48 h-[450px] flex max-md:flex-col max-md:items-center flex-wrap max-md:w-full px-3 max-md:py-14 max-md:gap-y-14">
    <div class="flex flex-col w-[50%] max-md:w-full md:h-100 max-md:h-48 justify-center items-center max-md:my-5">
      <!-- title 1 -->
      <div class=" flex flex-col justify-center ">
        <h1 class="text-orange text-4xl text-center">
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
    <div class="w-1/2 flex max-md:flex-col justify-center max-md:w-2/3 max-md:items-center">
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
