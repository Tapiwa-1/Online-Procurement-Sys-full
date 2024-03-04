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
    roles: Object
})

watch(item, value =>{
   router.get('/admin/roles',
    {item: value},
    {
        preserveState: true,
        preserveScroll: true,
    }


    )

})


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

const closeModal = () => {
    showAddRoleOverlay.value = false;

    form.reset();
};
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
        <div class="py-12">
            <div class="max-w-7xl min-h-screen mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between" >
                        <Link :href="route('request.create')" class="my-auto inline-flex items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span class="p-2 my- transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Create Request
                            </span>
                        </Link>
                        <div class="relative  " >

                            <input type="text" id="table-search" class="block  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                        </div>
                    </div>


            </div>
        </div>
        </div>
    </AuthenticatedLayout>

    </section>

</template>
