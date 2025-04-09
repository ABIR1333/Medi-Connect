<!DOCTYPE html>
<html>
@include('medecin.Layout.head')

<body class="m-0 font-sans antialiased font-normal leading-default bg-gray-50 text-black">
    <main class="relative h-screen transition-all duration-200 ease-in-out rounded-xl">
        <!-- Navbar -->
        @include('medecin.Layout.navbar')
        <!-- end Navbar -->

        <!-- cards -->
        <div class="p-6 pb-0 mx-auto">
            <!-- row 1 -->
            @yield('content')

            @include('medecin.Layout.footer')

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