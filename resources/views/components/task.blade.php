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
<div class="bg-gray-50 w-full mt-2">
    <div class="flex justify-between p-2">
        <div>
            <kbd class=" px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">{{$project}}</kbd>
        </div>
        <div class="flex" >
            {{$priority}} priority
            @if($priority=="low")
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                </svg>
            @elseif($priority=="medium")
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13 4.024v-.005c0-.053.002-.353-.217-.632a1.013 1.013 0 0 0-1.176-.315c-.192.076-.315.193-.35.225-.052.05-.094.1-.122.134a4.358 4.358 0 0 0-.31.457c-.207.343-.484.84-.773 1.375a168.719 168.719 0 0 0-1.606 3.074h-.002l-4.599.367c-1.775.14-2.495 2.339-1.143 3.488L6.17 15.14l-1.06 4.406c-.412 1.72 1.472 3.078 2.992 2.157l3.94-2.388c.592-.359.958-.996.958-1.692v-13.6Zm-2.002 0v.025-.025Z" clip-rule="evenodd"/>
                </svg>
            @else
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                </svg>
            @endif
        </div>
    </div>
    <button type="button" data-modal-target="{{$title}}" data-modal-toggle="{{$title}}"  aria-controls="{{$title}}" class="inline-flex w-full items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
        <img class="w-10 h-10" src="data:image/png;base64,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" alt="task">
        <span class="w-full">{{$title}}</span>
        @if($state=="en_cours")
            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{$state}}</span>
        @elseif($state=="terminé")
            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$state}}</span>
        @else
            <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{$state}}</span>
        @endif
    </button>
    @if(!($state=="terminé"))
        <div class="inline-flex w-full items-center justify-center rounded-md shadow-sm" role="group">
            <form action="{{route("task-management.setStatus", ['task' => $task, 'state' => $state=="non_commencé" ? "en_cours" : "terminé"])}}" method="post">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <span class="block pr-2">{{$state=="non_commencé"? "Start task" : "Finish the task" }}</span>
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            </form>
        </div>
    @endif
</div>


<div id="{{$title}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{$title}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$title}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{$description}}
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="{{$title}}" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ok
                </button>
            </div>
        </div>
    </div>
</div>
