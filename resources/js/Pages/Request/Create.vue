<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import DynamicInput from "@/Components/DynamicInput.vue"
import DashboardTopHeading from '@/Components/DashboardTopHeading.vue';
import InputField from '@/Components/InputField.vue'

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    name: '',
});

const submit = () => {
    form.post(route('admin.roles.store')
    );
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="mb-3 text-gray-500 dark:text-gray-400">
                <DashboardTopHeading name="Create a new request" />
            </div>
        </template>
         <div class="py-12">
            <div class="max-w-7xl min-h-screen mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" shadow-md sm:rounded-lg">
                         <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                        {{ status }}
                                    </div>
                                    <!-- @submit.prevent="submit" -->
                                    <!-- <DynamicInput/> -->
                                        <div>
                                           <InputField
                                                label="Name"
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.date"
                                                autofocus
                                            />
                                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> Some error message.</p>
                                        </div>
                                        <!-- <div>
                                            <InputLabel for="Title" value="Title" />
                                            <TextInput
                                                id="name"
                                                type="date"
                                                class="mt-1 block w-full"
                                                v-model="form.date"
                                                autofocus
                                            />
                                            <InputError class="mt-2" :message="form.errors.title" />
                                        </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </AuthenticatedLayout>
</template>
