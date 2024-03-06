<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <!-- include VueJS first -->
        <script src="https://unpkg.com/vue@next"></script>

        <!-- use the latest VueQuill release -->
        <script src="https://unpkg.com/@vueup/vue-quill@latest"></script>
        <link rel="stylesheet" href="https://unpkg.com/@vueup/vue-quill@latest/dist/vue-quill.snow.prod.css">

        <!-- or point to a specific VueQuill release -->
        <!-- <script src="https://unpkg.com/@vueup/vue-quill@1.2.0"></script> -->
        <link rel="stylesheet" href="https://unpkg.com/@vueup/vue-quill@1.2.0/dist/vue-quill.snow.prod.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased dark:bg-gray-700">
        @inertia
    </body>
</html>
