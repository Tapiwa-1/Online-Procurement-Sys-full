<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DashboardTopHeading from '@/Components/DashboardTopHeading.vue';
import Modal from '@/Components/Modal.vue';
import { createInertiaApp, Head, Link , useForm, router  } from '@inertiajs/vue3';
import { nextTick, ref,watch,computed } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Pagination.vue'


let item = ref(null)

// Define props
const { OneRequest } = defineProps({
    procurementArticle: Object,
    users: Object, // Assuming you have a users prop as well
});


</script>

<template>
    <Head title="Admin | Dashboard" />
    <section>
    <AuthenticatedLayout>
        <template #header>
            <div class="mb-3 text-gray-500 dark:text-gray-400">
                <DashboardTopHeading name="Manage Articles Here" />
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <figure class="relative max-w-sm  hover:grayscale-0">
                <a href="#">
                    <img class="rounded-lg" :src="procurementArticle.file" alt="image description">
                </a>

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

                                    <h2 class="text-4xl font-extrabold dark:text-white my-5">{{ procurementArticle.name }}</h2>
                                    <p class="text-xl dark:text-white my-5">{{ procurementArticle.summary }}</p>
                                    <div v-html="procurementArticle.description">
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </AuthenticatedLayout>

    </section>

</template>
