<template>
<FeatureLayout :details="details">


    <h2 class="text-2xl font-extrabold text-black dark:text-white">Bidders / Contractors</h2>
    <p class="my-4 text-lg text-gray-500">
        The Procurement Regulatory Authority of Zimbabwe is mandated, in line with Section 6(1) (Public Procurement and Disposal of Public Assets Act), to to develop and implement a transparent and equitable framework for the registration of bidders and contractors to the Public Sector. Further, in terms of Section 4 (2) of the Public Procurement and Disposal of Public Assets (General) Regulations, 2018, the Authority is entitled to compile an annual list of registered bidders and contractors that shall be eligible to bid and be awarded contracts with procuring entities, which list shall be published in the Gazette and the Authority’s website. What is required to register as a Bidder/Contractor to the Public Sector? For a bidder or contractor to be considered as registered Bidder or Contractor to the Public Sector, they need to register their company online and the following are the mandatory steps that needs to be followed;
    </p>

    <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 1. Login or Sign Up</h2>
    <p class="my-4 text-lg text-gray-500">
      When you first get to our portal you are presented with the login or sign-up option, choose the option applicable if its your first time on our portal and you don't have an account click on (Sign Up), if you already have an account click on (Login) option to get started.
    </p>

      <h2 class="text-2xl font-extrabold text-black dark:text-white my-2">Step 2. First time on the portal? (Sign Up)</h2>
        <p class="my-4 text-lg text-gray-500">
       First fill in your company administrator's details including name and surname. Second fill in a desired password to protect your account. Third fill in your company details and select the appropriate account type e.g(PBC/PVT/Partnership) then click on Submit.
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
    heading: "Create Your account",
    subHeading: "Learn How to create account"
})
</script>
