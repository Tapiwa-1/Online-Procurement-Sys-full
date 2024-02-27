<template>
<FeatureLayout :details="details">
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime corporis placeat ducimus adipisci sed est debitis itaque consequatur mollitia facilis, animi, distinctio ipsum? Dolorem blanditiis magni, quae inventore nemo unde?
</FeatureLayout>
</template>

<script setup>
import FeatureLayout from '@/Components/FeatureLayout.vue'
import {ref} from 'vue'
let details = ref({
    heading: "Category Registration",
    subHeading: "How to register for a Category"
})
</script>
