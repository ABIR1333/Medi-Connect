<!DOCTYPE html>
<html>
@include('admin.layout.head')

<body class="m-0 font-sans antialiased font-normal leading-default bg-gray-50 text-black">
    <!-- sidenav  -->
    @include('admin.layout.sidenav')
    <!-- end sidenav -->

    <main class="relative h-screen transition-all duration-200 ease-in-out xl:ml-[calc(68*0.25rem)] rounded-xl">
        <!-- Navbar -->
        @include('admin.layout.navbar')
        <!-- end Navbar -->

        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            @yield('content')


        </div>
        <!-- end cards -->
    </main>
</body>
<!-- plugin for charts  -->
{{-- <script src="../assets/js/plugins/chartjs.min.js" async></script> --}}
<!-- plugin for scrollbar  -->
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> --}}
<!-- main script file  -->
{{-- <script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script> --}}

</html>