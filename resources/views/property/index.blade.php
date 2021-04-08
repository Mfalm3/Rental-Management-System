@extends('layouts.dashboard')

@section('dash-content')

    <div class="bg-gray-800 pt-3">
        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Manage Properties</h3>
        </div>
    </div>

    <div class="flex flex-wrap justify-center">
        @foreach($properties as $property)
            <x-listing-card
                name="{{ $property->name }}"
                location="{{ $property->location }}"
                property="{{ $property->name }}"/>
        @endforeach
    </div>
@endsection
