@extends('layouts.dashboard')

@section('dash-content')

    <div class="bg-gray-800 pt-3">
        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between">
            <h3 class="font-bold pl-2">Manage Ad Listings</h3>
            <a href="{{ route('ad.create') }}" class="bg-blue-600 rounded p-2 ring-2 ring-blue-400 text-sm transform hover:-translate-y-0.5 hover:ring-blue-500">Create new Ad</a>
        </div>
    </div>
    <div class="flex flex-wrap m-5">

        @foreach($ads as $ad)
            <x-adlistcard :ad="$ad" />
        @endforeach

    </div>

@endsection
