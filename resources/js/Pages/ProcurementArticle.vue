<template>
<FeatureLayout :details="details">


    <h2 class="text-2xl font-extrabold text-black dark:text-white">{{ procurementArticle.name }}</h2>
    <p class="my-4 text-lg text-gray-500">

    {{ procurementArticle.summary }}
    </p>


        <img class="h-auto max-w-lg rounded-lg" :src="procurementArticle.file" alt="article">

    <div class="text-white" v-html="procurementArticle.description"></div>

</FeatureLayout>
</template>

<script setup>
import FeatureLayout from '@/Components/FeatureLayout.vue'
import {ref, defineProps} from 'vue'

const props = defineProps({
    procurementArticle:Object
})

let details = ref({
    heading:  props.procurementArticle.name,
    subHeading: "explore latest articles here"
})

</script>
