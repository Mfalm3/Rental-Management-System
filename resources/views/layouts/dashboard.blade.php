@extends('layouts.app')

@section('content')

    <div class="flex flex-col md:flex-row">
        <x-sidebar>
            <x-sidebar-item to="/dashboard" segment="dashboard" color="pink" fontawesome="fas fa-home">Dashboard</x-sidebar-item>
            <x-sidebar-item to="/properties" segment="properties" color="blue" fontawesome="fas fa-city">Properties</x-sidebar-item>
            <x-sidebar-item to="#" color="purple" segment="report" fontawesome="fas fa-chart-pie">Reports</x-sidebar-item>
            <x-sidebar-item to="/users" color="red" segment="users" fontawesome="fas fa-cog">Manage Users</x-sidebar-item>
            <x-sidebar-item to="#" color="green" segment="ui" fontawesome="fas fa-file">Statement</x-sidebar-item>
            <x-sidebar-item to="/ad" color="green" segment="ui" fontawesome="fas fa-">Ad Listing</x-sidebar-item>
        </x-sidebar>

        <div id="content" class="flex-1 md:mt-16 pb-24 md:pb-5">
            @yield('dash-content')
        </div>

    </div>

@endsection
