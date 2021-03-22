@extends('layouts.app')

@section('content')

    <div class="flex flex-col md:flex-row">
        <x-sidebar>
            @yield('dash-content')
        </x-sidebar>

    </div>

@endsection
