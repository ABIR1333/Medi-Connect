<nav class="relative flex rounded-lg bg-white shadow-lg flex-wrap items-center justify-between mx-6 px-2 py-4 transition-all ease-in duration-250 lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    {{-- <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit"> --}}
        {{-- <h6 class="mb-0 font-bold text-black capitalize">@yield('mini title')</h6> --}}
        <ul class="flex justify-between px-4 mb-0 list-none w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
            <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
          </li> -->
            <li class="flex items-center">
                <span style="font-family:Georgia, 'Times New Roman', Times, serif"><b>Bonjour {{Auth::user()->nom}} {{Auth::user()->prenom}}</b></span>
            </li>
            {{-- <li class="flex gap-8 items-center" x-data="{open : false}">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button>logout</button>
                </form>
                <i class="relative fa fa-user sm:mr-1" @click="open = true"></i>
                <div x-show="open" class="absolute hidden">
                    <span>hi</span>
                    <p @click="open = false">close</p>
                </div>
            </li> --}}

            <li class="relative flex items-center gap-4" x-data="{ open: false }">
                <!-- User Icon - Toggle Button -->
                <button @click="open = !open" class="flex items-center focus:outline-none">
                    <i class="fa fa-user text-gray-600 hover:text-teal-600 transition-colors"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open"
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 top-5"
                     style="display: none;">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>

            {{-- <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                    sidenav-trigger>
                    <div class="w-4.5 overflow-hidden">
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    </div>
                </a>
            </li>
            <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                    <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                    <!-- fixed-plugin-button-nav  -->
                </a>
            </li>

            <!-- notifications -->

            <li class="relative flex items-center pr-2">
                <p class="hidden transform-dropdown-show"></p>
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                    dropdown-trigger aria-expanded="false">
                    <i class="cursor-pointer fa fa-bell"></i>
                </a>

                <ul dropdown-menu
                    class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative mb-2">
                        <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                            href="javascript:;">
                            <div class="flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/img/team-2.jpg"
                                        class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                                            class="font-semibold">New message</span> from Laur</h6>
                                    <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                        <i class="mr-1 fa fa-clock"></i>
                                        13 minutes ago
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="relative mb-2">
                        <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                            href="javascript:;">
                            <div class="flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                        class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                                            class="font-semibold">New album</span> by Travis Scott</h6>
                                    <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                        <i class="mr-1 fa fa-clock"></i>
                                        1 day
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="relative">
                        <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                            href="javascript:;">
                            <div class="flex py-1">
                                <div
                                    class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>credit-card</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(453.000000, 454.000000)">
                                                        <path class="color-background"
                                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                            opacity="0.593633743"></path>
                                                        <path class="color-background"
                                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment
                                        successfully completed</h6>
                                    <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                        <i class="mr-1 fa fa-clock"></i>
                                        2 days
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    {{-- </div> --}}
</nav>