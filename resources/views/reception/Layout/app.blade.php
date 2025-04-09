<!DOCTYPE html>
<html x-data>
@include('reception.Layout.head')

<body class="m-0 font-sans antialiased font-normal leading-default bg-gray-50 pt-4 text-black">
    @include('reception.Layout.navbar')
    <main class="relative min-h-[calc(100dvh-120px)] transition-all duration-200 ease-in-out rounded-xl">
        <!-- Navbar -->
        <!-- end Navbar -->

        <!-- cards -->
        <div class="p-6 pb-0 mx-auto min-h-[calc(100dvh-120px)]">
            <!-- row 1 -->
            @yield('content')
        </div>
        <div class="">
            @include('reception.Layout.footer')
        </div>
        <!-- end cards -->
    </main>
</body>
<!-- plugin for charts  -->
{{-- <script src="../assets/js/plugins/chartjs.min.js" async></script> --}}
<!-- plugin for scrollbar  -->
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<!-- main script file  -->
{{-- <script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script> --}}

</html>