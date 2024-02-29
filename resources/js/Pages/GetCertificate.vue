<template>
<FeatureLayout :details="details">


    <h2 class="text-2xl font-extrabold text-black dark:text-white">Bidders / Contractors</h2>
    <p class="my-4 text-lg text-gray-500">
       Every bidder must have a PRAZ certificate in order to be eligible for participating in a tender. To get the certificate there are two options to select for payment, one (Once off) and the second option is (Quarterly which is renewed every 3 months). For international registration is USD $850.00 in terms of Section 4 of the Public Procurement and Disposal of Public Assets (General) Regulations, 2018.
    </p>

    <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">How do I know if my application was successful</h2>
    <p class="my-4 text-lg text-gray-500">

     All Applicants who meet the criteria for registration as a Bidder or Contractor set out in a Call for Registration document shall, after consideration and approval by the Authority, be published through downloading a Certificate online, a General Notice in the Government Gazette and the Authority’s Website in terms of Section 4 (2) of the Procurement Regulations. Applicants who do not meet the criteria set out in the solicitation documents shall be asked to comply before approval of their applications.
    </p>

      <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 1. Go to Registrations Option</h2>
        <p class="my-4 text-lg text-gray-500">
       Click on the button new/renew whether it's your first time registering or you just want a renewal. this will take you to your next step.
    </p>

     <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 3. Login</h2>
    <p class="my-4 text-lg text-gray-500">
    Enter your email address and password then click on submit. If you forgot your password just click on forgot password and if you fail to reset send an email to ICT support (ictsupport@praz.org.zw) and include your company name as the e-mail letter head and a message requesting the reset.
    </p>

    <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 4. Login success, whats next?</h2>
    <p class="my-4 text-lg text-gray-500">

       Congratulations you have successfully logged in! Almost there, now we need you upload all your directors information in order to access/download all your PRAZ certificates. What to put, a pdf copy of each and every director or director's ID this is done by simply clicking on the blue rounded button with a plus icon, once you successfully complete you will then be able to access the dashboard immediately.
    </p>

     <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 5. Documents Upload</h2>
    <p class="my-4 text-lg text-gray-500">

     This is a crucial step in getting your PRAZ certificate. Upload the appropriate document at the right slot (Note: no cheating as this will only delay your certificate approval or may hinder you from never getting it as documents are thoroughly checked). Every company type has its on set of required documents upload the right on at the right slot as well to avoid delays and last but certainly not the least make sure they are CLEAR. Once done you can begin your category registration process.
    </p>

    <p class="my-4 text-lg text-gray-500">

     Note: for those with the CR5 and the CR6 documents pliease upload the CR6 on the CR14 slot and the CR5 on the CR6 slot.
Articles and memorandum should be a minimum of six pages and the first three pages should be the cover page of the memorandum one page from the inside and the signatories same as for the articles.
    </p>
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
