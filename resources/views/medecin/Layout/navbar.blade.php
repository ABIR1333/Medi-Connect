<nav class="relative flex rounded-lg bg-white shadow-lg flex-wrap items-center justify-between mx-6 mt-4 px-2 py-4 transition-all ease-in duration-250 lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    {{-- <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit"> --}}
        {{-- <h6 class="mb-0 font-bold text-black capitalize">@yield('mini title')</h6> --}}
        <ul class="flex justify-between px-4 mb-0 list-none w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
            <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
          </li> -->
            <li class="flex items-center">
                <span style="font-family:Georgia, 'Times New Roman', Times, serif"><b>Bonjour Dr.{{Auth::user()->nom}} {{Auth::user()->prenom}}</b></span>
            </li>
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
        </ul>



          
</nav>