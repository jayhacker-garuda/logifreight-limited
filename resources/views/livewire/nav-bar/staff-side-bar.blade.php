<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div x-data class="flex justify-between h-screen mx-auto">
        <!-- Mobile Menu Toggle -->
        <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen" class="absolute z-50 shadow-md sm:hidden top-5 right-5 hover:text-yellow-300 focus:outline-none hover:bg-base-100 hover:rounded-md">
            <!-- Menu Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                :class="$store.sidebar.navOpen ? 'hidden' : '' " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

            <!-- Close Icon -->
            <svg x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                :class="$store.sidebar.navOpen ? '' : 'hidden' " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </button>
        <div class="fixed space-y-2 transition-all duration-300 border-r-2 border-yellow-300 shadow-md rounded-r-md bg-cool-gray-800 sm:relative"
            :class="{ 'w-64' : $store.sidebar.full, 'w-64 sm:w-20' : !$store.sidebar.full, 'top-0 left-0': $store.sidebar.navOpen, 'top-0 -left-64 sm:left-0' : !$store.sidebar.navOpen }">
            <h1 class="py-4 font-black text-white"
                :class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 sm:px-2' ">LOGIFREIGHT</h1>
            <div class="h-screen px-4 space-y-6">

                <!-- SideBar Toggle -->
                <button @click="$store.sidebar.full = !$store.sidebar.full " style="right: -12px"
                    class="absolute hidden p-1 rounded-full shadow-md sm:block top-10 bg-cool-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 text-white transition-all duration-300 transform"
                        :class="$store.sidebar.full ? 'rotate-90':'-rotate-90' " fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Home -->
                <div wire:click="$emitUp('show_dashboard')"
                    @click="$store.sidebar.active = 'home'"
                    x-data="tooltip"
                    x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center p-2 space-x-2 rounded-md cursor-pointer hover:text-cool-gray-200 hover:bg-cool-gray-600"
                    :class="{ 'justify-start' : $store.sidebar.full, 'sm:justify-center' : !$store.sidebar.full, 'text-cool-gray-200 bg-cool-gray-800': $store.sidebar.active == 'home', 'text-cool-gray-400': $store.sidebar.active != 'home' }">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <h1 x-cloak :class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : '' ">Dashboard</h1>
                </div>
                <!-- Quick Alerts -->
                <div x-data="dropdown" class="relative">
                    <div @click="toggle('quick-alert')"
                        x-data="tooltip"
                    x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                        class="flex items-center justify-between p-2 space-x-2 rounded-md cursor-pointer hover:text-cool-gray-200 hover:bg-cool-gray-600">
                        <div class="relative flex items-center space-x-2"
                            :class="{ 'justify-start' : $store.sidebar.full, 'sm:justify-center' : !$store.sidebar.full, 'text-cool-gray-200 bg-cool-gray-800': $store.sidebar.active == 'quick-alert', 'text-cool-gray-400': $store.sidebar.active != 'quick-alert' }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <h1 x-cloak :class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : '' ">Quick Alerts</h1>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            :class="$store.sidebar.full ? '': 'sm:hidden' " stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-show="open" @click.outside="open = false"
                        :class="$store.sidebar.full ? expandedClass : shrinkedClass"
                        class="space-y-3 text-cool-gray-400">
                        <a href="javascript:void(0)" wire:click="$emitUp('show_quick_alerts')" class="cursor-pointer hover:text-cool-gray-200">View Quick-Alerts</a>
                        <h1 class="cursor-pointer hover:text-cool-gray-200">Add Quick-Alert</h1>
                    </div>
                </div>
                <!-- Package Details -->
                <div wire:click="$emitUp('show_package_details')" @click="$store.sidebar.active = 'package-details'"
                    x-data="tooltip"
                    x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center justify-between p-2 space-x-2 rounded-md cursor-pointer text-cool-gray-400 hover:text-cool-gray-200 hover:bg-cool-gray-600">
                    <div class="flex items-center space-x-2"
                        :class="{ 'justify-start' : $store.sidebar.full, 'sm:justify-center' : !$store.sidebar.full, 'text-cool-gray-200 bg-cool-gray-800': $store.sidebar.active == 'package-details', 'text-cool-gray-400': $store.sidebar.active != 'package-details' }">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <h1 x-cloak :class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : '' ">Package Details</h1>
                    </div>
                    <h1 :class="$store.sidebar.full ? '': 'sm:hidden' "
                        class="w-5 h-5 p-1 text-sm leading-3 text-center bg-green-400 rounded-sm text-cool-gray-900">8
                    </h1>
                </div>
                <!-- Profile -->
                <div x-data="dropdown" class="relative">
                    <div @click="toggle('profile')"
                        x-data="tooltip"
                    x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                        class="flex items-center justify-between p-2 space-x-2 rounded-md cursor-pointer text-cool-gray-400 hover:text-cool-gray-200 hover:bg-cool-gray-600">
                        <div class="relative flex items-center space-x-2"
                            :class="{ 'justify-start' : $store.sidebar.full, 'sm:justify-center' : !$store.sidebar.full, 'text-cool-gray-200 bg-cool-gray-800': $store.sidebar.active == 'quick-alert', 'text-cool-gray-400': $store.sidebar.active != 'quick-alert' }"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h1 x-cloak :class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : '' ">Settings</h1>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                            :class="$store.sidebar.full ? '': 'sm:hidden' "
                            fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false"
                        :class="$store.sidebar.full ? expandedClass : shrinkedClass"
                        class="space-y-3 text-cool-gray-400">
                        <!-- Sub Dropdown -->
                        <div x-data="sub_dropdown" class="relative w-full">
                            <div @click="sub_toggle" class="flex items-center justify-between cursor-pointer">

                                <h1 x-data class="cursor-pointer hover:text-cool-gray-200">STAFF : NAME</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div x-cloak x-show="sub_open" @click.outside="sub_open = false" :class="$store.sidebar.full ? sub_expandedClass : sub_shrinkedClass">
                                <h1 class="cursor-pointer hover:text-cool-gray-200">View Profile</h1>
                            </div>
                        </div>
                        <!-- other drop down if any -->
                        <h1 class="cursor-pointer hover:text-cool-gray-200">Logout</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
