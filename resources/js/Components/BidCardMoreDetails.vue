<template>
    <NuxtLink to="/auth/login"
        class="flex flex-col items-start bg-white border border-gray-200 py-1 my-1 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
            src="~/assets/img/sample1.jpeg" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="text-xl font-extrabold dark:text-white my-2">Bid Invitation: {{ bidDetails.bidInvitation }}</h5>

            <h5 class="text-xl font-extrabold dark:text-white my-2">Bidder: {{ bidDetails.bidder }}</h5>

            <h5 class="text-xl font-extrabold dark:text-white my-2">Bid Date: {{ bidDetails.BidDate }}</h5>

            <h5 class="text-xl font-extrabold dark:text-white my-2"> Item: {{ bidDetails.bidProduct }}</h5>

            <!-- <div class="" v-html="bidDetails.bidDescription"></div> -->
            <!-- bid Description start -->
            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Description: MacBook Air (M2) is a
                high-performance laptop with a 13.3-inch Retina display, an Apple M2 chip,
                8GB of RAM, and 256GB of SSD storage. It is also equipped with the latest Wi-Fi and Bluetooth technology,
                and it
                comes with a one-year warranty. It has a battery life of up to 18 hours.</p>
            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Unit Price: $1,199</p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Total Bid Amount: $23,980</p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Delivery Schedule: ACME Technologies can
                deliver the laptops within 30 days of receiving the purchase order.
            </p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Payment Terms: Net 30 days</p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Additional Information: ACME Technologies
                is a certified Apple reseller and has a proven track record of
                providing high-quality IT products and services. We are committed to providing our customers with the best
                possible value for their money.</p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Product Specifications:</p>

            <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400"></p>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>
                    Display: 13.3-inch Retina display (2560x1600)
                </li>
                <li>
                    Processor: Apple M2 chip
                </li>
                <li>
                    RAM: 8GB
                </li>
                <li>Storage: 256GB SSD</li>
                <li>Operating System: macOS Ventura</li>
                <li> Battery Life: Up to 18 hours</li>
                <li>Dimensions: 11.97 inches x 8.46 inches x 0.63 inches</li>
                <li>Weight: 2.7 pounds</li>
            </ul>
            <p> Thank you for considering ACME Technologies for your IT needs. We look forward to the opportunity to partner
                with you.
                <br>
                Sincerely,
                <br>
                ACME Technologies
            </p>
            <!-- bid Description end -->
        </div>
    </NuxtLink>
</template>
<script setup>
defineProps({
    bidDetails: Object,
})

</script>