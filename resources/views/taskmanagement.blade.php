
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Tasks') }}
        </h2>
        <div class="flex gap-2 justify-end">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2 pb-4">
                        <x-nav-link :href="route('task-management')" :active="request()->routeIs('task-management')">
                            {{ __('All') }}
                        </x-nav-link>
                    </li>
                    <li class="me-2 pb-4">
                        <x-nav-link :href="route('not-started')" :active="request()->routeIs('not-started')">
                            {{ __('Not started') }}
                        </x-nav-link>
                    </li>
                    <li class="me-2">
                        <x-nav-link :href="route('in-progress')" :active="request()->routeIs('in-progress')">
                            {{ __('In-progress') }}
                        </x-nav-link>
                    </li>
                    <li class="me-2">
                        <x-nav-link :href="route('completed')" :active="request()->routeIs('completed')">
                            {{ __('Completed') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full gap-4 p-6  text-gray-900 dark:text-gray-100">
                    @if($tasks->isEmpty())
                        <p class="text-center text-black"> < Aucune tâche à afficher /> </p>
                    @endif
                    <div class="flex flex-wrap">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@if($alert)
    <div id="toast-message-cta" tabindex="-1" aria-hidden="true" class="overflow-y-auto flex overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full rounded-lg " role="alert">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-dismiss-target="#toast-message-cta" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                    Vous avez une nouvelle notification.
                    <a href="{{route("notification")}}" class="text-blue-600">Cliquez ici pour voir </a>
                </p>
            </div>
        </div>
    </div>
@endif
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


@yield('modalContent')
