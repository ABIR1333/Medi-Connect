@extends('admin.layout.app')
@section('mini title')
    <h3>Dashboard</h3>
@endsection
@section('content')
    <div class="bg-white rounded-lg py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('dashboard.admin')
        </div>
    </div>
@endsection