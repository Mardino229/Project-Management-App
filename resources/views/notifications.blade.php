
<x-app-layout>
    <x-slot name="header">
        <h2 class="items-center justify-between flex font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <img class="w-8 h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADMklEQVR4nOWaTWvUUBSGL4hWBUXFhbWZnDdpbKULu6hfS3UhKrgUlyIIiiiI6F9QN7qxuHZREKRUV/6CIi4qSp0256ZqoX7Uj1ZaS1Faa+SkM1jbpp2Oc29m9IUXZpKb5Dw599yb3BmlDGmgsTHHQKcm+ipmoCsEmlUtaaCxMaeBUQ3E8zwaBYGjakUsmVgIMWui+6pWpKU7pYAw0bj6R0DGVK2Iga5UEKBTVauGHGedBq5oohvyXUantGLv8/0d0kbayjFyrKoGaaBVA2Hhbv8IfX+3bJfRSQpbaiIx0FmEYM/bI20LcHJsa6YQ7LqHGJicd9dHJNC0Y7Tn7Z2fLTlHSHTQbvTFgIDWRSCKQ+w0E93VwL539fXrxRHR/mQb0XRK7Uyy5+2yCjFItJaB/tS5okwz0C/ntgaigauVhpgzPF+2AtHT1raaiT4ZBPko1zAOEnnecVMQ+neNHTMOooF20yBMdNs4CBM9MQ4CPLYB8sF41wLe2wD5biEj34xC5Fta1ljIRiw2OnLlHWeLLZBBok3GQF75vmsLRDtOgzGQyHVbbIEw0U5jIEx01BZIBBw2CXLJWtcCLhoD0cAdiyDtxkAYyFuskedGIJJXV3vZiBn4GeZy22u9PmIjdRIrtYqBlxmAvJZrVwwkIjqdAURc8KmKQMgMq4EvGYKM9Ltu/d9lIgg2MvAsQ4i44J6wuXlDeZlwXV8TvagCiDgxUS+7rrciiJDogKQ08+CxAOazxFYSBAMnNdFU5kEjFWaKPe9EKSBvMw8WS5uJ3iwPQjReAyBjpWTkXtaB6uXdsSyIPN9oIl0FwcaLmojzRNtUKZLVcw3cSl1tz6I7IYnlpsSmypoQPe+MJnqogeEMAIY18EBikFhUpdQHEBMdCYnOaeC69FUNPNJAt0yeTDRUeJxJzMDMnDs688c+aTs74XYXztHBwDUNnJVryLUqFvh/K+26Pjc1be113c3iKAjqivvkc3G7tJG2qlqliSZKLt5q/uMAr2Cl3sqKe7mSV9MVZOS8qlZFQVBXyvsLA09lQVxVs7TjNCwFIxBGVkeUASU/P3jeBamDZAAgmpDP0p1MZeIXP3px2qvbFRcAAAAASUVORK5CYII=" alt="appointment-reminders--v1">
            {{ __('My Notifications') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full gap-4 p-6  text-gray-900 dark:text-gray-100">
                    @if($notifications->isEmpty())
                        <p class="text-center text-black"> < Aucune notification à afficher /> </p>
                    @endif
                    @foreach($notifications as $notification)
                            <div class="flex flex-wrap w-full mb-4 {{$notification->is_read ? "bg-gray-50 text-gray-800 dark:text-gray-400":"bg-blue-50 text-blue-800 dark:text-blue-400"}} ">
                                <div class="px-4 pt-4 w-full text-md rounded-lg dark:bg-gray-800" role="alert">
                                    <span class="font-medium">Info alert!</span> {{$notification->message}}
                                </div>
                                @if(!($notification->is_read))
                                <div class="flex w-full justify-end">
                                    <form method="post" action="{{route("notification.marked", $notification)}}">
                                        @csrf
                                        <button type="submit" class="focus:outline-none mx-2 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                            Marked as read
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>
                    @endforeach
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


@yield('modalContent')
