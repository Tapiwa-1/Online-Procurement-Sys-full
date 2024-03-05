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
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DangerButton from '@/Components/DangerButton.vue'
import {ref } from "vue"


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



let msg = ref(null)
let items = ref([
    {
        goodsOrService: "",
        quantity:"",
        estCost:"",
    },
]) // Initialize as an array with an object

let participants = ref([
    {
        name:"",
    },
]) // Initialize as an array with an object

function addMore() {
    items.value.push([{
        goodsOrService: "",
        quantity:"",
        estCost:""
    }],);
}

function remove(index) {
    items.value.splice(index, 1);
}

function addMoreParticipant() {
    participants.value.push([{
        name: "",

    }],);
}

function removeParticipant(index) {
    participants.value.splice(index, 1);
}
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
                                                label="Purpose"
                                                id="Purpose"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.purpose"

                                            />
                                            <p id="filled_error_help" class="mt-2 text-md text-green-600 dark:text-green-400">Indicate whether for program /Project / Normal Operations</p>
                                            <!-- <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> Some error message.</p> -->
                                        </div>
                                        <div class="my-2">
                                           <InputField
                                                label="If Program /Project state the name"
                                                id="Program-Project"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.programProject"

                                            />
                                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> Some error message.</p>
                                        </div>
                                        <SecondaryButton class="border"
                                        @click="addMore()" >
                                            Add More
                                        </SecondaryButton>

                                        <div v-for="(item, index) in items" :key="index" class="flex my-2">
                                            <InputField
                                                label="Goods or Service"
                                                id="good-or-service"
                                                type="text"
                                                class="mt-1 block w-full mr-2"
                                                v-model="item.goodsOrService"


                                            />
                                            <InputField
                                                label="Quantity"
                                                id="quantity"
                                                type="number"
                                                class="mt-1 block  mx-2"
                                                v-model="item.quantity"

                                            />
                                            <InputField

                                                label="Cost"
                                                id="cost"
                                                type="text"
                                                class="mt-1 block"
                                                v-model="item.estCost"

                                            />
                                             <DangerButton
                                                    class="ml-1"

                                                    @click="remove(index)"
                                                    v-show="index != 0"
                                                >
                                                    Remove
                                             </DangerButton>
                                        </div>
                                         <SecondaryButton class="border"
                                        @click="addMoreParticipant()" >
                                            Add Participants
                                        </SecondaryButton>

                                        <div v-for="(participant, index) in participants" :key="index" class="flex my-2">
                                            <InputField
                                                label="Name"
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full mr-2"
                                                v-model="participant.name"


                                            />

                                             <DangerButton
                                                    class="ml-1"

                                                    @click="removeParticipant(index)"
                                                    v-show="index != 0"
                                                >
                                                    Remove
                                             </DangerButton>
                                        </div>

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
