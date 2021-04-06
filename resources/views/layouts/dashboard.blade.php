@extends('layouts.app')

@section('content')

    <div class="flex flex-col md:flex-row">
        <x-sidebar>
            <x-sidebar-item to="/dashboard" color="pink" fontawesome="fas fa-home">Dashboard</x-sidebar-item>
            <x-sidebar-item to="/properties" path="properties" color="blue" fontawesome="fas fa-city">Properties</x-sidebar-item>
            <x-sidebar-item to="#" color="purple" fontawesome="fas fa-chart-pie">Reports</x-sidebar-item>
            <x-sidebar-item to="#" color="red" fontawesome="fas fa-cog">Manage Users</x-sidebar-item>
            <x-sidebar-item to="#" color="green" fontawesome="fas fa-file">Statement</x-sidebar-item>

        </x-sidebar>

        <div id="content" class="flex-1 md:mt-16">
            @yield('dash-content')
        </div>

    </div>

@endsection
