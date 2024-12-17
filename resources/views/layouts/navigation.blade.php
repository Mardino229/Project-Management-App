<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex gap-0.5 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                    <p class="flex md:hidden font-bold text-xl">Teamsync</p>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                       {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('project-management')" :active="request()->routeIs('project-management')">
                        {{ __('Project Management') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('task-management')"
                                :active="request()->routeIs('task-management')|request()->routeIs('not-started')|request()->routeIs('in-progress')|request()->routeIs('completed')">
                        {{ __('Task Management') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('user-management')"
                                :active="request()->routeIs('user-management')|request()->routeIs('pro-management')">
                        {{ __('Admin Management') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('notification')"
                                :active="request()->routeIs('notification')">
                        {{ __('Notifications') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center lg:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nO2YQQoDMQhFc5KY4zT0/qDbae/R0sVA203IkGibeQ+yjPL5omJKAAA/ieV81VLuVsqj56nITUXq7HhNXh97k70l3WbHa3I02f5mx2uCgC9woBdKaLUS0n9voypSj4hQkU1FLuEC3DEEBGM4ELyNGm10sUFmCDibAzp4d4kQUEfuLsyVaHAgGv85kAdf5mijZxtkhoBPcKAXSmi1NqrelzkdvI26X+YAAJIHT2AeUQlPhJ8IAAAAAElFTkSuQmCC" alt="dashboard-layout">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('project-management')" :active="request()->routeIs('project-management')">
                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABoklEQVR4nO2VPUsDQRCG18LOQkUsJHfz3hVBYpEiCFaCgqD+F4lYp/Sj00bwDwj+AkWwEPyIIqkkIbNREbX2A2OjKJE9NhhDclm5jbHwha32ZZ6Znd0dIf5lKCY6ZSArflsSqKhlK9hxNaD1RXTYETATHTQF5xOJHm18sHGC567bZ9SSouMM6exubICvfN81AjPRcAAG8jbAF44zYgb2vFENPrEBLhGNmVY8rW/grg2wJJo16zGQ1sZ1G2AmmjerGNjQxjkr4K94lVCjBPaVqeR5UzbA1Xih4Fwq1c3AozKpZxUVWhsvFFwkmtAX6ywq9Fu8VmAJbOrPY8EGmIGtlmBWHwfRqwTu87FYf1SoBJKS6C0UfE3UK4Fc0FsgHRV66fuDDBTqh4RokN1R20ZhGJiJ9joCrhcT3bVhFt+agGdswhVUzQARRRLIVN96RYiuIFEgqyEZ0Q5xPD7ARE9BFa47WZPMuE7mWd1o62AJrOlZvd1gb0dXvWobusLAOwMf6nNosJ9Ue9qzbBP8oo+z3NRDVG7lET8VA0sqIAOLUTx/Qp8+hx1agvXj4wAAAABJRU5ErkJggg==" alt="flipboard">
                {{ __('Project Management') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('task-management')" :active="request()->routeIs('task-management')|request()->routeIs('not-started')|request()->routeIs('in-progress')|request()->routeIs('completed')">
                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAU0lEQVR4nO2UwQkAMAgDM0r33+imaRco+JJIm4M8/B0GlUKYCGvtWyKgYkNV3hFoB7dAwF0B0wVwnyFugXZwCwTcFTBFQMXcfoZyC+CugPyB8AMHOiyJsGkcPdgAAAAASUVORK5CYII=" alt="checklist">
                {{ __('Task Management') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user-management')" :active="request()->routeIs('user-management')|request()->routeIs('pro-management')">
                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABe0lEQVR4nOWUO0sDQRSFt7SJaMDKzZyTZWFFrS3ExlJsNMFCf5PBxsdPSq/BzF2LBSMRi1iFVL6YsIFkMzvuahrxwmVZ5s75Zu6ZGc/7FxGHoa/Jtibf02yL768vDKDJGyE/M3m9EPGHWm1LyMQCSGKlNksLxko1hWzpev1EyCtNfljEx5mOXaa1LQEaTnEBTvPEpGDGwJlVPAGWhOz/FiBk32jNAXQQ7OW2Ang0retGUcWkBo4E0Hn1XaV25wAd368KObCJd3y/mq2/VWrVjFkAgwRYsXtQr+9ocjTTU6WaeZ6l5k6bPjIabqPJ4cx2o6iSVxuH4XJm9UOneFlA6bC1SIBjbxGRmvw6Zxogk12IUoeafCpyXDXQ08BBoWMah+HauAbolbkT5pQVumjepIVusZcusC/AnW2u86nwvgEY8fsg2DY1Y0geIIU0NHmenvELTb65ANPi5mv+nYBsaGDDBsjW2cQLAaYjb6JZhJDPrvYWCvnB6/r3AV++q0PrmMhVlwAAAABJRU5ErkJggg==" alt="administrative-tools">
                {{ __('Admin Management') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notification')" :active="request()->routeIs('notification')">
                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADMklEQVR4nOWaTWvUUBSGL4hWBUXFhbWZnDdpbKULu6hfS3UhKrgUlyIIiiiI6F9QN7qxuHZREKRUV/6CIi4qSp0256ZqoX7Uj1ZaS1Faa+SkM1jbpp2Oc29m9IUXZpKb5Dw599yb3BmlDGmgsTHHQKcm+ipmoCsEmlUtaaCxMaeBUQ3E8zwaBYGjakUsmVgIMWui+6pWpKU7pYAw0bj6R0DGVK2Iga5UEKBTVauGHGedBq5oohvyXUantGLv8/0d0kbayjFyrKoGaaBVA2Hhbv8IfX+3bJfRSQpbaiIx0FmEYM/bI20LcHJsa6YQ7LqHGJicd9dHJNC0Y7Tn7Z2fLTlHSHTQbvTFgIDWRSCKQ+w0E93VwL539fXrxRHR/mQb0XRK7Uyy5+2yCjFItJaB/tS5okwz0C/ntgaigauVhpgzPF+2AtHT1raaiT4ZBPko1zAOEnnecVMQ+neNHTMOooF20yBMdNs4CBM9MQ4CPLYB8sF41wLe2wD5biEj34xC5Fta1ljIRiw2OnLlHWeLLZBBok3GQF75vmsLRDtOgzGQyHVbbIEw0U5jIEx01BZIBBw2CXLJWtcCLhoD0cAdiyDtxkAYyFuskedGIJJXV3vZiBn4GeZy22u9PmIjdRIrtYqBlxmAvJZrVwwkIjqdAURc8KmKQMgMq4EvGYKM9Ltu/d9lIgg2MvAsQ4i44J6wuXlDeZlwXV8TvagCiDgxUS+7rrciiJDogKQ08+CxAOazxFYSBAMnNdFU5kEjFWaKPe9EKSBvMw8WS5uJ3iwPQjReAyBjpWTkXtaB6uXdsSyIPN9oIl0FwcaLmojzRNtUKZLVcw3cSl1tz6I7IYnlpsSmypoQPe+MJnqogeEMAIY18EBikFhUpdQHEBMdCYnOaeC69FUNPNJAt0yeTDRUeJxJzMDMnDs688c+aTs74XYXztHBwDUNnJVryLUqFvh/K+26Pjc1be113c3iKAjqivvkc3G7tJG2qlqliSZKLt5q/uMAr2Cl3sqKe7mSV9MVZOS8qlZFQVBXyvsLA09lQVxVs7TjNCwFIxBGVkeUASU/P3jeBamDZAAgmpDP0p1MZeIXP3px2qvbFRcAAAAASUVORK5CYII=" alt="appointment-reminders--v1">
                {{ __('Notifications') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
