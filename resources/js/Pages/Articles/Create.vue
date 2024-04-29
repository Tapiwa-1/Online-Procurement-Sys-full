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
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import MultipleSelect from '@/Components/MultipleSelect.vue'
import {ref, computed, onMounted, reactive } from "vue"
  import { router, usePage } from '@inertiajs/vue3';

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
    users: Object
});


const form = reactive({
    file:'',
    name:'',
    description:'',

});



let isValidFile = ref(null)
let fileDisplay = ref('')

 let error = ref({
        file: null,
        name: null,
        description: null,
    })

 const createArticleFunc = ()=>{
        //create errors first
        error.value.file = null
        error.value.name = null
        error.value.summary = null
        error.value.description = null


        router.post('/procurement-article ', form,{
            forceFormData: true,
            preserveScroll: true,
            onError: errors => {
                errors && errors.file ? error.value.file = errors.file: ''
                errors && errors.name ? error.value.name = errors.name: ''
                errors && errors.summary ? error.value.summary = errors.summary: ''
                errors && errors.description ? error.value.description = errors.description: ''
            },
            // onSuccess: () => {
            //     closeOverlay()
            //     emit('close')
            // }
        })
    }

   const getUploadedImage = (e) =>{
        form.file = e.target.files[0] // get the file that has been uploaded and put it into form.file declared above
        let extention = form.file.name.substring(form.file.name.lastIndexOf('.') + 1); //get the file extension
        console.log(extention)

        if (extention == 'png' || extention == 'jpg' || extention == 'jpeg') {
            isValidFile.value = true
        } else {
            isValidFile.value = false
            return
        }
        fileDisplay.value = URL.createObjectURL(e.target.files[0])

        setTimeout(() => {
            document.getElementById('TextAreaSection').scrollIntoView({behavior: 'smooth'});
        }, 300);

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
                                <form @submit.prevent="submit" class=" overflow-hidden shadow-sm sm:rounded-lg">

                                    <!--  -->
                                    <!-- <DynamicInput/> -->
                                        <div class="mb-2">
                                            <div class="flex items-center bg-gray-900 w-full h-full overflow-hidden">
                                                <div v-if="!fileDisplay" class="flex flex-col items-center mx-auto">
                                                    <label
                                                        for="file"
                                                        class="hover:bg-blue-700 bg-blue-500 rounded-lg p-2.5 text-white font-extrabold cursor-pointer"
                                                    >
                                                        Select From Computer
                                                    </label>
                                                    <input
                                                        id="file"
                                                        class="hidden"
                                                        type="file"
                                                        @input="getUploadedImage($event)"

                                                    >
                                                    <div v-if="error && error.file" class="text-red-500 text-center p-2 font-extrabold">{{ error.file }}</div>
                                                    <div v-if="!fileDisplay && isValidFile === false" class="text-red-500 text-center p-2 font-extrabold">
                                                        File not accepted
                                                    </div>
                                                </div>
                                                <img v-if="fileDisplay && isValidFile === true" class=" min-w-[400px] p-4 mx-auto" :src="fileDisplay">
                                            </div>
                                        </div>
                                        <div>
                                           <InputField
                                                label="Name"
                                                id="Name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.name"

                                            />

                                            <div v-if="error && error.name" class="text-red-500 p-2 font-extrabold">{{ error.name }}</div>

                                        </div>
                                         <div>
                                           <InputField
                                                label="Summary"
                                                id="Summary"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.summary"

                                            />

                                            <div v-if="error && error.summary" class="text-red-500 p-2 font-extrabold">{{ error.summary }}</div>

                                        </div>

                                        <div class="my-2">
                                              <quill-editor v-model:content="form.description" class=" min-h-[500px] text-white"  content-type="html" theme="snow"></quill-editor>
                                        </div>

                                        <div v-if="error && error.description" class="text-red-500 p-2 font-extrabold">{{ error.description }}</div>

                                        <PrimaryButton @click="createArticleFunc()" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Create Article
                                        </PrimaryButton>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </AuthenticatedLayout>
</template>
