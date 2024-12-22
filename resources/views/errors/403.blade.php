<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('teamsync.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<section class="bg-white dark:bg-gray-900 mt-64">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-4xl tracking-tight font-extrabold lg:text-3xl ">403 | Access Denied</h1>
            <p class="mb-4 text-2xl tracking-tight font-bold text-gray-900 md:text-2xl dark:text-white">Something went wrong</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, you don't have permission to access this page. </p>
            <a href="{{ url("dashboard") }}" class="inline-flex text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to dashboard</a>
        </div>
    </div>
</section>

</body>
</html>
