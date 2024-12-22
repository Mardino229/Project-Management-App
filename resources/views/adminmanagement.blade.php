<x-app-layout>
    <x-slot name="header">
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('User List') }}--}}
{{--        </h2>--}}
        <div class="flex gap-2 justify-end">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2 pb-4">
                        <x-nav-link :href="route('user-management')" :active="request()->routeIs('user-management')">
                            {{ __('User Management') }}
                        </x-nav-link>
                    </li>
                    <li class="me-2 pb-4">
                        <x-nav-link :href="route('pro-management')" :active="request()->routeIs('pro-management')">
                            {{ __('Projects\'User Management') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <div class="relative overflow-x-auto">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@if (session('success'))
    <div id="toast-message-cta" tabindex="-1" aria-hidden="true" class="overflow-y-auto flex overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full rounded-lg " role="alert">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-dismiss-target="#toast-message-cta" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Success</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div id="toast-message-cta" tabindex="-1" aria-hidden="true" class="overflow-y-auto flex overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full rounded-lg " role="alert">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-dismiss-target="#toast-message-cta" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
                <div class="text-red-500 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Operation Failed</p>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif
{{--@if($alert)--}}
{{--    <div id="toast-message-cta" tabindex="-1" aria-hidden="true" class="overflow-y-auto flex overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full rounded-lg " role="alert">--}}
{{--        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
{{--            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">--}}
{{--                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-dismiss-target="#toast-message-cta" aria-label="Close">--}}
{{--                    <span class="sr-only">Close</span>--}}
{{--                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">--}}
{{--                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <p class="text-lg font-semibold text-gray-900 dark:text-white">--}}
{{--                    Vous avez une nouvelle notification.--}}
{{--                    <a href="{{route("notification")}}" class="text-blue-600">Cliquez ici pour voir  </a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

