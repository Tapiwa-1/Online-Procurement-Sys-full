<script setup>
import {ref} from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { Cropper, CircleStencil } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css';
import {
    PencilIcon,

} from '@heroicons/vue/24/outline'

let isRegister = ref(true)
let file = ref(null)
let cropper = ref(null)
let uploadedImage = ref(null)

const getUploadedImage = (e) => {
    file.value = e.target.files[0]
    uploadedImage.value = URL.createObjectURL(file.value)
}
const cropAndUpdateImage = async () => {
    const { coordinates } = cropper.value.getResult()
    let data = new FormData();

    data.append('image', file.value || '')
    data.append('height', coordinates.height || '')
    data.append('width', coordinates.width || '')
    data.append('left', coordinates.left || '')
    data.append('top', coordinates.top || '')

    try {
        // await $userStore.updateUserImage(data)
        // await $userStore.getUser()
        // await $profileStore.getProfile(route.params.id)

        // $generalStore.updateSideMenuImage($generalStore.suggested, $userStore)
        // $generalStore.updateSideMenuImage($generalStore.following, $userStore)

        // userImage.value = image.value
        uploadedImage.value = null
    } catch (error) {
        console.log(error)
    }
}
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">Profile</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                    <div class=" p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-900">
                        <div v-if="!uploadedImage" id="ProfilePhotoSection"
                            class="flex flex-col border-b sm:h-[118px] h-[145px] px-1.5 py-2 w-full">
                            <div class="font-semibold text-[15px] sm:mb-0 mb-1 text-gray-700 sm:w-[160px] sm:text-left text-center">
                                Profile photo
                            </div>

                            <div class="flex items-center justify-center sm:-mt-6">
                                <label for="image" class="relative cursor-pointer">
                                    <img class="rounded-full" width="95" src="https://picsum.photos/200">
                                    <div
                                        class="absolute bottom-0 right-0 rounded-full bg-white shadow-xl border p-0.5 border-gray-300 inline-block w-[32px]">
                                        <PencilIcon class="-mt-1 ml-0.5" />
                                    </div>
                                </label>
                                <input class="hidden" type="file" id="image" @input="getUploadedImage"
                                    accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </div>
                        <div v-else class="w-full h-[430px]">
                            <Cropper class="h-[430px]" ref="cropper" :stencil-component="CircleStencil" :src="uploadedImage" />
                        </div>

                        <div id="CropperButtons" v-if="uploadedImage" class="flex items-center justify-end">
                            <button @click="uploadedImage = null"
                                class="flex items-center border rounded-sm px-3 py-[6px] hover:bg-gray-100">
                                <span class="px-2 font-medium text-[15px]">Cancel</span>
                            </button>

                            <button @click="cropAndUpdateImage()"
                                class="flex items-center bg-[#F02C56] text-white border rounded-md ml-3 px-3 py-[6px]">
                                <span class="mx-4 font-medium text-[15px]">Apply</span>
                            </button>
                        </div>
                    </div>


                <div v-if="!uploadedImage" class="p-4 sm:p-8 bg-white dark:bg-gray-900 dark:text-white shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div v-if="!uploadedImage" class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div v-if="!uploadedImage" class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
