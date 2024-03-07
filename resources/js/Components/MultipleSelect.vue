<template>
  <div class="relative">
    <input
      v-model="search"
      @input="filterOptions"
      placeholder="Search..."
      class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
    />
    <select multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="" selected>Choose a category</option>
      <option v-for="(user, index) in filteredUsers" :key="index">{{ user.name }} <span> Position:
        <template v-for="(role, index) in user.roles" :key="index">
            {{ role.name }}
        </template>
        </span>
    </option>
    </select>
  </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';

const search = ref('');
const { users } = defineProps({
  users: Array
});

const filteredUsers = ref([]);

function filterOptions() {
  filteredUsers.value = users.filter(user =>
    user.name.toLowerCase().includes(search.value.toLowerCase())
  );
}
</script>

<style scoped>
/* Styles if any */
</style>
