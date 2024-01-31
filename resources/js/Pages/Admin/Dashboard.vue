
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                </div>
            </div>
        </div> -->
        <template #header>
            <div class="mb-3 text-gray-500 dark:text-gray-400">
                <DashboardTopHeading :name="username" />
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="col-span-2">
                    <div class="mb-3 text-gray-500 dark:text-gray-400 shadow">
                        <StatisticsSlot>
                            <dl
                                class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white sm:p-8">
                                <div class="flex flex-col">
                                    <dt class="mb-2 text-3xl font-extrabold">00.0%</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">CPU Usage</dd>
                                </div>
                                <div class="flex flex-col">
                                    <dt class="mb-2 text-3xl font-extrabold">0.0</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">Memory Usage</dd>
                                </div>
                                <div class="flex flex-col">
                                    <dt class="mb-2 text-3xl font-extrabold text-green-400">100%</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">System health</dd>
                                </div>
                            </dl>
                        </StatisticsSlot>
                    </div>
                    <div class="mb-3 text-gray-500 dark:text-gray-400">
                        <StatisticsSlot>
                            <dl
                                class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 dark:text-white sm:p-8">
                                <div class="flex flex-col">
                                    <dt class="mb-2 text-3xl font-extrabold">234</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">Users</dd>
                                </div>
                                <div class="flex flex-col">
                                    <dt class="mb-2 text-3xl font-extrabold">12</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">Back Ups</dd>
                                </div>
                            </dl>
                        </StatisticsSlot>
                    </div>
                </div>
                <div class="mb-3 text-gray-500 dark:text-gray-400">

                    <TableSlot :tableMeta="tableMeta">
                        <li v-for="user in users" :key="user.id" class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/300" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ user.name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ user.email }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{ user.role }}
                                </div>
                            </div>
                        </li>
                    </TableSlot>

                </div>
            </div>
            <div class="mb-3 text-gray-500 dark:text-gray-400">
                <Footer />
            </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from 'vue';
import DashboardTopHeading from '@/Components/DashboardTopHeading.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import StatisticsSlot from '@/Components/StatisticsSlot.vue';
import TableSlot from '@/Components/TableSlot.vue'
import { Head } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';

const users = ref([
    { id: 1, name: "Tapiwa Motsi", email: "tmosti10@gmail.com", role: "Admin" },
    { id: 1, name: "John Doe", email: "Jdoe@gmail.com", role: "supplier" },
    { id: 1, name: "Mutsa Muguti", email: "mmuguti&gmail.com", role: "IT director" },
    { id: 1, name: "Nelson Nunga", email: "nnunga@gmail.com", role: "Proc director" },
    { id: 1, name: "Farai Kanoda", email: "fkanoda@gmail.com", role: "Fin director" },
    { id: 1, name: "Gibson Wodzi", email: "gwodzi0@gmail.com", role: "Proc officer" },
])
const username = "John Doe"

const tableMeta = ref({
    heading: "Users",
    url: "/admin/users",
    urlName: "View More"
})
</script>
