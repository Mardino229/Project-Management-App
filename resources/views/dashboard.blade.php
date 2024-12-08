<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2 lg:flex-nowrap flex-wrap  w-full">
                        <div class="block w-full  p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tasks Statistics</h5>
                            <p class="font-normal  text-gray-700 dark:text-gray-400">Global view of tasks</p>
                            <div class="flex w-full gap-2 mb-6">
                                <div class="bg-blue-200 w-full  p-4 rounded-lg">
                                    <div class="flex flex-col justify-between mb-2">
                                        <h3 class="font-semibold text-blue-600">In progress</h3>
                                        <div class="font-bold text-3xl text-blue-600">
                                            {{$in_progress}}
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-green-200 w-full p-4 rounded-lg">
                                    <div class="flex flex-col text-green-600 justify-between mb-2">
                                        <h3 class="font-semibold">Completed</h3>
                                        <div class="font-bold text-3xl">
                                            {{$completed}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full gap-2">
                                <div class="bg-red-200 w-full  p-4 rounded-lg">
                                    <div class="flex flex-col text-red-600 justify-between mb-2">
                                        <h3 class="font-semibold ">No started</h3>
                                        <div class="font-bold text-3xl">
                                            {{$not_started}}
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-200 w-full p-4 rounded-lg">
                                    <div class="flex flex-col text-gray-600 justify-between mb-2">
                                        <h3 class="font-semibold">Total</h3>
                                        <div class="font-bold text-3xl">
                                            {{$total}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full  p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Projects Statistics</h5>
                            <p class="font-normal  text-gray-700 dark:text-gray-400">Global view of projects</p>
                            @if(empty($projectsDetails))
                                <p class="text-center text-black"> < Aucun projet à votre actif /> </p>
                            @endif
                            <div class="flex flex-col gap-2">
                                @foreach($projectsDetails as $details)
                                    <div class="bg-gray-100  p-4 rounded-lg">
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="font-semibold">{{$details->title}}</h3>
                                            <div class="font-bold">
                                                {{$details->completed}}/{{$details->total}} tasks completed
                                            </div>
                                        </div>
                                        <div class="w-full h-6 bg-gray-200 rounded-full dark:bg-gray-700">
                                            <div class="h-6 bg-blue-600 rounded-full dark:bg-blue-500" style="width: {{$details->percentage}}%"></div>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-2">{{$details->percentage}}% completed</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                    <a href="{{route("notification")}}" class="text-blue-600">Cliquez ici pour voir  </a>
                </p>
            </div>
        </div>
    </div>
@endif
