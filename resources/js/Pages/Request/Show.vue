<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DashboardTopHeading from '@/Components/DashboardTopHeading.vue';
import Modal from '@/Components/Modal.vue';
import { createInertiaApp, Head, Link , useForm, router   } from '@inertiajs/vue3';
import { nextTick, ref,watch } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Pagination.vue'


let item = ref(null)

defineProps({
    OneRequest: Object,
    users: Object,
})

</script>

<template>
    <Head title="Admin | Dashboard" />
    <section>
    <AuthenticatedLayout>
        <template #header>
            <div class="mb-3 text-gray-500 dark:text-gray-400">
                <DashboardTopHeading name="Manage Request Here" />
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <figure class="relative max-w-sm  hover:grayscale-0">
                <a href="#">
                    <img class="rounded-lg" :src="OneRequest.file" alt="image description">
                </a>
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p class="bg-gray-300 text-gray-950">{{ OneRequest.purpose }}</p>
                </figcaption>
            </figure>
        </div>
        <div class="py-12">
            <div class="max-w-7xl min-h-screen mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between" >
                    </div>
                    <div class=" text-gray-800 dark:text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class=" shadow-md sm:rounded-lg">
                            <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white">

                                    <h2 class="text-4xl font-extrabold dark:text-white my-5">{{ OneRequest.purpose }}</h2>
                                    <div v-html="OneRequest.description">
                                    </div>


                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Participants
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <template v-for="user in users" :key="user.id">
                                                            <template v-if="user.id == OneRequest.participant1">
                                                                {{user.name  }}
                                                            </template>
                                                        </template>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        <template v-if="OneRequest.participant1approval == null">
                                                            <p class=" text-red-600"> Pending</p>
                                                        </template>
                                                        <template v-if="OneRequest.participant1approval">
                                                            <p class=" text-green-600"> Approved</p>
                                                        </template>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <template v-for="user in users" :key="user.id">
                                                            <template v-if="user.id == OneRequest.participant2">
                                                                {{user.name  }}
                                                            </template>
                                                        </template>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        <template v-if="OneRequest.participant2approval == null">
                                                            <p class=" text-red-600"> Pending</p>
                                                        </template>
                                                        <template v-if="OneRequest.participant2approval">
                                                            <p class=" text-green-600"> Approved</p>
                                                        </template>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <template v-for="user in users" :key="user.id">
                                                            <template v-if="user.id == OneRequest.participant3">
                                                                {{user.name  }}
                                                            </template>
                                                        </template>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        <template v-if="OneRequest.participant3approval == null">
                                                            <p class=" text-red-600"> Pending</p>
                                                        </template>
                                                        <template v-if="OneRequest.participant3approval">
                                                            <p class=" text-green-600"> Approved</p>
                                                        </template>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <template v-for="user in users" :key="user.id">
                                                            <template v-if="user.id == OneRequest.participant4">
                                                                {{user.name  }}
                                                            </template>
                                                        </template>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        <template v-if="OneRequest.participant4approval == null">
                                                            <p class=" text-red-600"> Pending</p>
                                                        </template>
                                                        <template v-if="OneRequest.participant4approval">
                                                            <p class=" text-green-600"> Approved</p>
                                                        </template>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="mb-1 text-xl font-medium dark:text-white my-4">Request Status</div>
                                            <div class="w-full h-6 bg-gray-200 rounded-full dark:bg-gray-700 my-3">
                                                <div v-if="OneRequest.status == null" class="h-6 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 0%"></div>
                                                <div v-if="OneRequest.status == 25" class="h-6 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 25%"></div>
                                            </div>
                                    </div>
                                    <PrimaryButton v-if="!$page.props.user.userRoles.includes('admin')" class="my-4">
                                                Approve
                                    </PrimaryButton>

                                </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </AuthenticatedLayout>

    </section>

</template>
