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
    purpose:'',
    programProject:'',
    description:'',
    participant1:'',
    participant2:'',
    participant3:'',
    participant4:'',
});

const search = ref('');
const search1 = ref('');
const search2 = ref('');
const search3 = ref('');

const  users  = props.users
const  users1  = props.users
const  users2  = props.users
const  users3  = props.users

const filteredUsers = ref([]);
const filteredUsers1 = ref([]);
const filteredUsers2 = ref([]);
const filteredUsers3 = ref([]);

let isValidFile = ref(null)
let fileDisplay = ref('')

 let error = ref({
        file: null,
        purpose: null,
        programProject: null,
        description: null,
        participant1: null,
        participant2: null,
        participant3: null,
        participant4: null,
    })

 const createRequestFunc = ()=>{
        //create errors first
        error.value.file = null
        error.value.purpose = null
        error.value.programProject = null
        error.value.description = null
        error.value.participant1 = null
        error.value.participant2 = null
        error.value.participant3 = null
        error.value.participant4 = null

        router.post('/request ', form,{
            forceFormData: true,
            preserveScroll: true,
            onError: errors => {
                errors && errors.file ? error.value.file = errors.file: ''
                errors && errors.purpose ? error.value.text = errors.purpose: ''
                errors && errors.programProject ? error.value.programProject = errors.programProject: ''
                errors && errors.description ? error.value.description = errors.description: ''
                errors && errors.participant1 ? error.value.participant1 = errors.participant1: ''
                errors && errors.participant2 ? error.value.participant2 = errors.participant2: ''
                errors && errors.participant3 ? error.value.participant3 = errors.participant3: ''
                errors && errors.participant4 ? error.value.participant4 = errors.participant4: ''
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


function filterOptions() {
  filteredUsers.value = users.filter(user =>
    user.name.toLowerCase().includes(search.value.toLowerCase())
  );
}
function filterOptions1() {
  filteredUsers1.value = users1.filter(user =>
    user.name.toLowerCase().includes(search1.value.toLowerCase())
  );
}

function filterOptions2() {
  filteredUsers2.value = users2.filter(user =>
    user.name.toLowerCase().includes(search2.value.toLowerCase())
  );
}
function filterOptions3() {
  filteredUsers3.value = users3.filter(user =>
    user.name.toLowerCase().includes(search3.value.toLowerCase())
  );
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
                                                label="Purpose"
                                                id="Purpose"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.purpose"

                                            />

                                            <div v-if="error && error.purpose" class="text-red-500 p-2 font-extrabold">{{ error.purpose }}</div>
                                            <p id="filled_error_help" class="mt-2 text-md text-green-600 dark:text-green-400">Indicate whether for program /Project / Normal Operations</p>

                                        </div>
                                        <div class="my-2">
                                           <InputField
                                                label="If Program /Project state the name"
                                                id="Program-Project"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.programProject"

                                            />

                                            <div v-if="error && error.programProject" class="text-red-500 p-2 font-extrabold">{{ error.programProject }}</div>
                                        </div>
                                        <div class="my-2">
                                              <quill-editor v-model:content="form.description" class=" min-h-[500px] text-white"  content-type="html" theme="snow"></quill-editor>
                                        </div>

                                        <div v-if="error && error.description" class="text-red-500 p-2 font-extrabold">{{ error.description }}</div>
                                        <div class="my-2">
                                               <InputLabel for="name" value="Participant 1" />
                                                <div class="relative">
                                                    <input
                                                    v-model="search"
                                                    @input="filterOptions"
                                                    placeholder="Search..."
                                                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 dark:bg-slate-800 dark:text-white"
                                                    />
                                                    <select multiple v-model="form.participant1" id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Choose a category</option>
                                                    <option v-for="(user, index) in filteredUsers" :key="index" :value="user.id">{{ user.name }} <span> Position:
                                                        <template v-for="(role, index) in user.roles" :key="index">
                                                            {{ role.name }}
                                                        </template>
                                                        </span>
                                                    </option>
                                                    </select>
                                                </div>

                                                <div v-if="error && error.participant1" class="text-red-500 p-2 font-extrabold">{{ error.participant1 }}</div>
                                                 <div class="relative">
                                                    <InputLabel for="name" value="Participant 2" />
                                                    <input
                                                    v-model="search1"
                                                    @input="filterOptions1"
                                                    placeholder="Search..."
                                                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  dark:bg-slate-800 dark:text-white"
                                                    />
                                                    <select v-model="form.participant2" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Choose a category</option>
                                                    <option v-for="(user, index) in filteredUsers1" :key="index" :value="user.id">{{ user.name }} <span> Position:
                                                        <template v-for="(role, index) in user.roles" :key="index">
                                                            {{ role.name }}
                                                        </template>
                                                        </span>
                                                    </option>
                                                    </select>
                                                </div>

                                                <div v-if="error && error.participant2" class="text-red-500 p-2 font-extrabold">{{ error.participant2 }}</div>
                                                   <div class="relative">
                                                    <InputLabel for="name" value="Participant 3" />
                                                    <input
                                                    v-model="search2"
                                                    @input="filterOptions2"
                                                    placeholder="Search..."
                                                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  dark:bg-slate-800 dark:text-white"
                                                    />
                                                    <select v-model="form.participant3" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Choose a category</option>
                                                    <option v-for="(user, index) in filteredUsers2" :key="index" :value="user.id">{{ user.name }} <span> Position:
                                                        <template v-for="(role, index) in user.roles" :key="index">
                                                            {{ role.name }}
                                                        </template>
                                                        </span>
                                                    </option>
                                                    </select>
                                                </div>

                                                <div v-if="error && error.participant3" class="text-red-500 p-2 font-extrabold">{{ error.participant3 }}</div>

                                                 <div class="relative">
                                                    <InputLabel for="name" value="Participant 4" />
                                                    <input
                                                    v-model="search3"
                                                    @input="filterOptions3"
                                                    placeholder="Search..."
                                                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500  dark:bg-slate-800 dark:text-white"
                                                    />
                                                    <select v-model="form.participant4" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Choose a category</option>
                                                    <option v-for="(user, index) in filteredUsers3" :key="index" :value="user.id">{{ user.name }} <span> Position:
                                                        <template v-for="(role, index) in user.roles" :key="index">
                                                            {{ role.name }}
                                                        </template>
                                                        </span>
                                                    </option>
                                                    </select>
                                                </div>

                                                <div v-if="error && error.participant4" class="text-red-500 p-2 font-extrabold">{{ error.participant4 }}</div>
                                        </div>
                                        <PrimaryButton @click="createRequestFunc()" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Create Request
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
