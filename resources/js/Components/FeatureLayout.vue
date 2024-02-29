<template>
  <NavLayout>
    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{ details.heading }}</h1>

        </div>
    </section>
    <div class="w-full p-4 text-center bg-white border border-gray-200  shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ details.subHeading }}</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">The e Tengai platform avails various online services and solutions to help you participate in government procurement.</p>
    </div>
    <div class="container mx-auto py-5">
        <slot></slot>
    </div>


  </NavLayout>
</template>

<script setup>
import { defineProps } from 'vue'
import NavLayout from '../Layouts/NavLayout.vue';

defineProps({
    details: Object
})
</script>

<style>

</style>
