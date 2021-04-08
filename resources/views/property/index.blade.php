@extends('layouts.dashboard')

@section('dash-content')

    <div class="bg-gray-800 pt-3">
        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between">
            <h3 class="font-bold pl-2">Manage Properties</h3>
            <a href="{{ route('properties.create') }}" class="bg-blue-600 rounded p-2 ring-1 ring-blue-400 text-sm">Add new property</a>
        </div>
    </div>

    <div class="flex flex-wrap justify-center">
        @foreach($properties as $property)
            <x-listing-card
                name="{{ $property->name }}"
                location="{{ $property->location }}"
                property="{{ $property->uuid }}"/>
        @endforeach
    </div>
@endsection
