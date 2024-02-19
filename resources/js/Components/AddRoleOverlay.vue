<template>
  <Modal :show="showAddRoleOverlay" @close="closeModal">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" shadow-md sm:rounded-lg">
                         <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                        {{ status }}
                                    </div>

                                    <form class="m-1" @submit.prevent="submit">
                                        <div>
                                            <InputLabel for="name" value="name" />

                                            <TextInput
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.name"

                                                autofocus
                                                autocomplete="name"
                                            />

                                            <InputError class="mt-2" :message="form.errors.name" />
                                        </div>
                                        <div class="flex items-center justify-end mt-4">

                                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Add Role
                                            </PrimaryButton>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal.vue';
import { Head, Link , useForm } from '@inertiajs/vue3';
import { nextTick, ref, defineEmits  } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    showAddRoleOverlay: Boolean
})

defineEmits(['modalClosed']);

const closeModal = () => {
  emit('modalClosed', true);
}

const form = useForm({
    name: '',
});

const submit = () => {
    form.post(route('admin.roles.store'),{
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });

};

// const closeModal = () => {
//     showAddRoleOverlay.value = false;
//     form.reset();
// };
</script>

<style>

</style>
