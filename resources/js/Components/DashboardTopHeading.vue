<template>
    <DashboardTopSlot>
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Welcome {{ name }}</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work
            forward with e-tengai.</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
            <a href="#"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <LogoNav />
            </a>
        </div>
    </DashboardTopSlot>
</template>
<script setup>
import DashboardTopSlot from './DashboardTopSlot.vue';
import LogoNav from './LogoNav.vue';

defineProps({
    name: String
})
</script>
