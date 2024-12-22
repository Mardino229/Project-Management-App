@props(
    [
        "task",
        "title",
        "description",
        "priority",
        "state",
        "project"
]
)

<div class="w-full lg:max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="justify-between gap-2 items-center mb-2 flex">
        <kbd class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">{{$project}}</kbd>
        <div>
            @if($state=="in progress")
                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{$state}}</span>
            @elseif($state=="completed")
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$state}}</span>
            @else
                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{$state}}</span>
            @endif
        </div>
    </div>
    <div class="flex justify-between">
        <h5 class="min-h-16 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$title}}</h5>
        <div>
            <div>
                <button id="{{$project.$title}}readProductButton" data-drawer-target="{{$project.$title}}readProductDrawer" data-drawer-show="{{$project.$title}}readProductDrawer" aria-controls="{{$project.$title}}readProductDrawer" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                        <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <p class="font-normal my-2 text-gray-700 dark:text-gray-400">
        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-yellow-300">Assigned to {{$task->user->name}}</span>
    </p>
{{--    <p class="font-normal text-gray-700 dark:text-gray-400">{{$description}}</p>--}}
    <div class="flex justify-between items-center mt-3" >
        <div>
            <p>Priority :
                <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                    {{$priority}}
                </span>
            </p>
        </div>
{{--        <button data-modal-target="{{$title.$state}}" data-modal-toggle="{{$title.$state}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
{{--            Read more--}}
{{--            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
        <button data-modal-target="{{$project.$title}}" data-modal-toggle="{{$project.$title}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Delegate
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </button>
    </div>
</div>
