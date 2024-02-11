<template>
  <!-- <div v-if="$page.props.flash.message"
    class="p-4 text-sm text-green-700 bg-green-100  dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success alert!</span> {{ $page.props.flash.message }}
  </div> -->
  <div class="w-full bg-gray-100 dark:bg-gray-900">

    <div class="flex justify-between px-4 py-1 items-center">
      <span class=" text-white text-4xl top-5 left-4 cursor-pointer">
        <Bars3Icon class="w-6 h-6  bg-transparent text-gray-700 dark:text-gray-100 rounded-md"
          @click="display = !display" />
      </span>
      <div class="flex items-center">
        <form class="mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." required>
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
        <button class="m-3" @click="toggleDark()">
          <SunIcon v-if="isDark" class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
          <MoonIcon v-else class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
        </button>
        <!-- Profile dropdown -->
        <Menu as="div" class="relative ml-3">
          <div>
            <MenuButton
              class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="sr-only">Open user menu</span>

              <img class="h-8 w-8 rounded-full" :src="$page.props.auth.user.file" alt="" />
            </MenuButton>
          </div>
          <transition enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95">
            <MenuItems
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-800 dark:text-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
              <Link :role="item.role" :href="item.href"
                :class="[active ? 'bg-gray-100 dark:bg-gray-900 ' : '', 'block px-4 py-2 text-sm text-gray-700 dark:text-white']">
              {{ item.name }}</Link>
              </MenuItem>
              <Link as="button" class="hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-white w-full text-left"
                :href="route('logout')" method="post"
                :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Logout</Link>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </div>
  </div>
  <div v-if="display"
    class="sidebar  absolute top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-100 dark:bg-gray-900">
    <div class="text-gray-100 text-xl">
      <div class="p-2.5 mt-1 flex items-center">
        <LogoNav />
        <XMarkIcon class="w-6 h-6 cursor-pointer ml-28 text-gray-900 dark:text-gray-200 " @click="display = false" />
      </div>
      <div class="my-2 bg-gray-600 h-[1px]"></div>
    </div>

    <div v-if="$page.props.user.userRoles.includes('admin')">
      <Link :href="route('dashboard')"
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-blue-100 dark:bg-gray-700 dark:hover:bg-blue-500 hover:bg-blue-600 text-white">
      <HomeIcon class="h-6 w-6 text-gray-900 dark:text-gray-200 " />
      <span class="text-[15px] ml-4 text-gray-900 dark:text-gray-200  font-bold">Admin</span>
      </Link>

      <Link :href="route('admin.roles.index')"
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-blue-100 dark:bg-gray-700 dark:hover:bg-blue-500 hover:bg-blue-600 text-white">
      <UserGroupIcon class="h-6 w-6 text-gray-900 dark:text-gray-200 " />
      <span class="text-[15px] ml-4 text-gray-900 dark:text-gray-200  font-bold">Roles</span>
      </Link>

    </div>

  </div>
  <header class="bg-white shadow dark:bg-gray-700" v-if="$slots.header">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <slot name="header" />
    </div>
  </header>
  <!-- Page Content -->
  <main class="dark:bg-gray-700 min-h-screen">
    <slot />
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useDark, useToggle } from '@vueuse/core';
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import LogoNav from '@/Components/LogoNav.vue';
import {
  HomeIcon,
  BookmarkIcon,
  ChevronDoubleDownIcon,
  LockClosedIcon,
  ChatBubbleLeftIcon,
  CursorArrowRaysIcon,
  XMarkIcon,
  Bars3Icon,
  SunIcon,
  MoonIcon,
  UserGroupIcon,
  UsersIcon,
  KeyIcon,
  BriefcaseIcon,
  DocumentPlusIcon,
} from '@heroicons/vue/24/outline'
import { ref } from 'vue';

defineProps({
  admin: Boolean,
})
const isDark = useDark();
const toggleDark = useToggle(isDark);

const user = {
  name: 'Tom Cook',
  email: 'tom@example.com',
  imageUrl:
    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
}
const userNavigation = [
  { name: 'Dashboard', href: route('dashboard'), role: '' },
  { name: 'Settings', href: route('profile.edit'), role: '' },
]
let display = ref(false);
</script>
