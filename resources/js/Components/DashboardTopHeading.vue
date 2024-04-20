<template>
    <DashboardTopSlot>
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ name }}</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work
            forward with e-tengai.</p>
    </DashboardTopSlot>
</template>
<script setup>
import DashboardTopSlot from './DashboardTopSlot.vue';
import LogoNav from './LogoNav.vue';

defineProps({
    name: String
})
</script>
