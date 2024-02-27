<template>
  <NavLayout>
    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Welcome To Zimbabwe’s e-Tengai Portal</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">This portal is a web-based, one stop public procurement system to manage the full lifecycle of a tendering and contract management process, for both procurement entities and suppliers. It bridges the gap between procurement entities and suppliers to ensure efficiency, fairness and transparency in the public procurement process.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>
    <div class="w-full p-4 text-center bg-white border border-gray-200  shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">What can we do for you today</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">The e Tengai platform avails various online services and solutions to help you participate in government procurement.</p>
    </div>
    <div class="container mx-auto">
        <div class="block sm:flex sm:justify-between ">
            <div  v-for="feature in features.feature1" :key="feature.name"   class="block w-full lg:max-w-sm p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <component :is="feature.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600 mx-auto m-10" aria-hidden="true" />
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ feature.name }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{  feature.description }}</p>
            </div>

        </div>
        <div class="block sm:flex sm:justify-between ">
            <div  v-for="feature in features.feature2" :key="feature.name"   class="block w-full lg:max-w-sm p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <component :is="feature.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600 mx-auto m-10" aria-hidden="true" />
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ feature.name }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{  feature.description }}</p>
            </div>

        </div>
    </div>
     <div class="w-full p-4 text-center bg-white border border-gray-200 my-2  shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Steps to be a supplier</h5>


        <div class="">
            <div class="block sm:flex sm:justify-between ">
                <div  v-for="feature in features.feature1" :key="feature.name"   class="block w-full lg:max-w-sm p-6 mt-4 items-center bg-white border border-gray-200 rounded-lg shadow   dark:bg-gray-800 dark:border-gray-700">
                        <component :is="feature.icon" class="h-20 w-20 flex-shrink-0 text-white mx-auto bg-slate-950 p-5 rounded-full " aria-hidden="true" />
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ feature.name }}</h5>
                     <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-2 px-2 sm:ms-4 text-base font-small text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                        Learn more
                    </a>
                </div>

            </div>

        </div>

    </div>

  </NavLayout>
</template>

<script setup>
import NavLayout from '../Layouts/NavLayout.vue';
import {
    UserPlusIcon,
    PaperClipIcon,
    TrophyIcon,
    AcademicCapIcon,
    HomeModernIcon,
    QueueListIcon,
    DocumentPlusIcon
} from '@heroicons/vue/24/outline'

const features = {
    feature1 : [
        {
            name: 'Registration',
            description: 'Register your company in the national supplier’s database to be able to participate in public procurement.',
            icon: UserPlusIcon,
        },
        {
            name: 'E-Tendering',
            description: 'Access tender notices of various government agencies for the procurement of goods, services and construction.',
            icon: PaperClipIcon,
        },
        {
            name: 'E-Awarding',
            description: 'Awarding of tenders and contract administration fee payments.',
            icon: TrophyIcon,
        },
        {
            name: 'Registration Service',
            description: 'Access portal for procuring entities portal for e-tender uploads and awarding.',
            icon: UserPlusIcon,
        },
    ],
    feature2 : [
        {
            name: 'Awards',
            description: 'Access list of all tender awards to date on the e-GP system',
            icon: AcademicCapIcon,
        },
        {
            name: 'Procuring Entities',
            description: 'Access list of all Government procuring entities',
            icon: HomeModernIcon,
        },
        {
            name: 'Suppliers List',
            description: 'Access all registered companies/service providers. Identify suppliers blacklisted and debarred from participating in public procurement',
            icon: QueueListIcon,
        },
        {
            name: 'Resources',
            description: 'Access various electronic resources i.e public procurement legislation, e-GP materials and Standard Bidding Documents.',
            icon: DocumentPlusIcon,
        },
    ],
    becomeSupplier: [
        {}
    ]

}
</script>

<style>

</style>
