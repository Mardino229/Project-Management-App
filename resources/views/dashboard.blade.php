<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-between  items-center flex text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <img class="md:w-10 md:h-10 w-8 h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nO2YQQoDMQhFc5KY4zT0/qDbae/R0sVA203IkGibeQ+yjPL5omJKAAA/ieV81VLuVsqj56nITUXq7HhNXh97k70l3WbHa3I02f5mx2uCgC9woBdKaLUS0n9voypSj4hQkU1FLuEC3DEEBGM4ELyNGm10sUFmCDibAzp4d4kQUEfuLsyVaHAgGv85kAdf5mijZxtkhoBPcKAXSmi1NqrelzkdvI26X+YAAJIHT2AeUQlPhJ8IAAAAAElFTkSuQmCC" alt="dashboard-layout">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto min-h-screen sm:px-6 lg:px-8">
            <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <div class="block w-full mb-2 p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class=" md:text-2xl text-lg font-bold tracking-tight text-gray-900 dark:text-white">Tasks Statistics</h5>
                            <p class="font-normal mb-2 text-gray-700 dark:text-gray-400">Global view of tasks</p>
                            <div class="flex gap-2">
                                <div class="md:flex w-full  gap-2 mb-6">
                                    <div class="bg-blue-200 md:mb-0 mb-2 w-full  p-4 rounded-lg">
                                        <div class="flex flex-col justify-between mb-2">
                                            <h3 class="font-semibold text-blue-600">In progress</h3>
                                            <div class="font-bold md:text-3xl text-xl text-blue-600">
                                                {{$in_progress}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-green-200 w-full p-4 rounded-lg">
                                        <div class="flex flex-col text-green-600 justify-between mb-2">
                                            <h3 class="font-semibold">Completed</h3>
                                            <div class="font-bold md:text-3xl text-xl">
                                                {{$completed}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex w-full  gap-2 mb-6">
                                    <div class="bg-red-200 w-full md:mb-0 mb-2  p-4 rounded-lg">
                                        <div class="flex flex-col text-red-600 justify-between mb-2">
                                            <h3 class="font-semibold ">Not started</h3>
                                            <div class="font-bold md:text-3xl text-xl">
                                                {{$not_started}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-200 w-full p-4 rounded-lg">
                                        <div class="flex flex-col text-gray-600 justify-between mb-2">
                                            <h3 class="font-semibold">Total</h3>
                                            <div class="font-bold md:text-3xl text-xl">
                                                {{$total}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full min-h-screen p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class=" md:text-2xl text-lg font-bold tracking-tight text-gray-900 dark:text-white">Projects Statistics</h5>
                            <p class="font-normal mb-2 text-gray-700 dark:text-gray-400">Global view of projects</p>
                            @if(empty($projectsDetails))
                                <p class="text-center text-black"> < Aucun projet à votre actif /> </p>
                            @endif
                            <div class="flex flex-col gap-2">
                                @foreach($projectsDetails as $details)
                                    <div class="flex md:flex-nowrap flex-wrap">
                                        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-1 md:p-3">
                                            <div class="flex justify-between mb-3">
                                                <div class="flex items-center">
                                                    <div class="flex justify-center items-center">
                                                        <h3 class="font-semibold">{{$details->title}}</h3>
                                                        <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                                            <div class="p-3 space-y-2">
                                                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                                                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                                                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                                                <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                                                                <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                                    </svg></a>
                                                            </div>
                                                            <div data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                                                <div class="grid grid-cols-3 gap-3 mb-2">
                                                    <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                                        <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">{{$details->not_started}}</dt>
                                                        <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">To do</dd>
                                                    </dl>
                                                    <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                                        <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">{{$details->in_progress}}</dt>
                                                        <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">In progress</dd>
                                                    </dl>
                                                    <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                                        <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">{{$details->completed}}</dt>
                                                        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Done</dd>
                                                    </dl>
                                                </div>
                                                <button data-collapse-toggle="{{$details->title}}more-details" type="button" class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show more details <svg class="w-2 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                    </svg>
                                                </button>
                                                <div id="{{$details->title}}more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                                                    <dl class="flex items-center justify-between">
                                                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until deadline:</dt>
                                                        <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                                            {{$details->days}} days</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="bg-gray-100 w-full  p-4 rounded-lg">
                                                <div class="flex justify-between items-center mb-2">
                                                    <h3 class="font-semibold">Progress bar</h3>
                                                    <div class="font-semibold">
                                                        {{$details->completed}}/{{$details->total}} completed
                                                    </div>
                                                </div>
                                                <div class="w-full md:h-4 h-2 bg-gray-200 rounded-full dark:bg-gray-700">
                                                    <div class="md:h-4 h-2 bg-blue-600 rounded-full dark:bg-blue-500" style="width: {{$details->percentage}}%"></div>
                                                </div>
                                                <p class="text-sm  text-gray-500 mt-2">{{$details->percentage}}% completed</p>
                                            </div>
                                        </div>
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
