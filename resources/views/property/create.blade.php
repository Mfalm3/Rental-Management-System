@extends('layouts.dashboard')

@section('dash-content')
<x-auth-card class="text-blue-900">
    <x-slot name="logo"></x-slot>
    <div class="flex flex-wrap">
        <div class="w-full xl:w-1/3 m-auto">
        <h3 class="text-center my-4">Add new property</h3>
        <hr class="mb-3">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="/properties" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <x-label for="name" :value="__('Property Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="off"/>
            </div>
            <div class="mb-3">
                <x-label for="name" :value="__('Location')" />

                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="off"/>
            </div>
            <div class="mb-3">
                <x-label for="ac_no" :value="__('Account Number')" />

                <x-input id="ac_no" class="block mt-1 w-full" type="text" name="account_number" :value="old('account_number')" autocomplete="off"/>
            </div>
            <div class="mb-3">
                <x-label for="landlord" :value="__('Property Owner')" />

                <select id="landlord" class="block mt-1 w-full" type="text" name="landlord_id" required autocomplete="off">
                    <option selected value="">Select a Property owner</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->info->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <x-label for="image" :value="__('Image files')"></x-label>
                <x-input type="file" name="images[]" multiple/>
            </div>
            <div class="mt-4 float-right">
                <x-button>Submit</x-button>
            </div>
        </form>
    </div>
    </div>
</x-auth-card>
@endsection
