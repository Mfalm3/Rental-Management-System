@extends('layouts.dashboard')

@section('dash-content')
    <x-auth-card class="text-blue-900">
        <x-slot name="logo"></x-slot>
        <div class="flex flex-wrap">
            <div class="w-full xl:w-1/3 m-auto">
                <h3 class="text-center my-4">Details for {{ $property->name }} </h3>
                <hr class="mb-3">

                <div class="mb-3">
                    <x-label for="name" :value="__('Property Name')"/>

                    <p class="block mt-1 w-full"> {{ $property->name }} </p>
                </div>
                <div class="mb-3">
                    <x-label for="name" :value="__('Location')"/>

                    <p class="block mt-1 w-full"> {{ $property->location }} </p>
                </div>
                <div class="mb-3">
                    <x-label for="ac_no" :value="__('Account Number')"/>

                    <p class="block mt-1 w-full"> {{ $property->account_number }} </p>
                </div>
                <div class="mb-3">
                    <x-label for="landlord" :value="__('Property Owner')"/>

                    <p class="block mt-1 w-full"> {{ $property->proprietor->info->name }} </p>
                </div>
            </div>
        </div>
    </x-auth-card>
@endsection
