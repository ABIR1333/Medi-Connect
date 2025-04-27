<nav class="relative flex rounded-lg bg-white shadow-lg flex-wrap items-center justify-between mx-6 mt-4 px-2 py-4 transition-all ease-in duration-250 lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <span class="flex gap-2">
            @yield('mini title')
        </span>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <li class="flex items-center">
                <span class="hidden sm:inline" style="font-family:Georgia, 'Times New Roman', Times, serif"><b>{{Auth::user()->nom}} {{Auth::user()->prenom}}</b></span>
            </li>
        </ul>
    </div>
</nav>