<template>
    <div id="ProfileSettingsOverlay"
        class="fixed flex justify-center pt-14  z-50 top-0 left-0 w-full h-full bg-black bg-opacity-50 overflow-auto">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">

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

            <div v-if="!uploadedImage" class=" p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-900">
                <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
            </div>

            <div v-if="!uploadedImage" class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg dark:bg-gray-900">
                <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div v-if="!uploadedImage" class="p-4 sm:p-8 bg-white shadow  sm:rounded-lg dark:bg-gray-900">
                <DeleteUserForm class="max-w-xl" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Cropper, CircleStencil } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css';
import {
    PencilIcon,

} from '@heroicons/vue/24/outline'
const { $generalStore } = useNuxtApp()
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
</script>