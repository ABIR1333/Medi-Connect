<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-lg xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">

            <a class="flex items-center gap-3 px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="/">
                <img src="{{asset('assets/img/heart.png')}}" class="h-8 w-auto transition-all duration-200 ease-nav-brand" alt="main_logo" />
                <span class="text-xl font-bold text-blue-600 hover:text-blue-800 transition duration-300">MediConnect</span>
            </a>
        </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full mt-4">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 hover:bg-blue-500/20 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                    href="{{route('dashboard')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0  leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Tableau de bord</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('receptions.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-user-nurse text-blue-500 "></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Réception</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('medecins.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-stethoscope text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Médecins</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('patients.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-bed text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Patients</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('appointments.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-regular fa-calendar-check text-blue-500 "></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Rendez-vous</span>
                </a>
            </li>

            {{-- <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('receptions.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-bell text-blue-500"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Notifications</span>
                </a>
            </li> --}}

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('services.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-heartbeat text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Services</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('covertures-sante.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-hospital-user text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Couvertures</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg"
                    href="{{route('profile.edit')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3 ">Profile</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <div class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-blue-500/20 rounded-lg cursor-pointer">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="flex items-center cursor-pointer">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-right-from-bracket te"></i>
                            </div>
                            <span
                                class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg py-3">Logout</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</aside>