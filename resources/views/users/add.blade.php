@extends('layouts.dashboard')

@section('dash-content')
<x-auth-card>
    <x-slot name="logo"></x-slot>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="/users/create" method="POST" x-data="{'utype':'','apartment':''}" >
        @csrf

        <nav class="container">
            <div class="flex justify-center py-4">
                @php
                $users = ['tenant', 'agent', 'landlord'];
                @endphp

                @for($i=0; $i < count($users); $i++)
                    <x-pill>{{ ucfirst($users[$i]) }}
                        <x-slot name='utype'>{{ $users[$i] }}</x-slot>
                    </x-pill>
                @endfor
            </div>
        </nav>

        <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-label for="contacts" :value="__('Contacts')" />

                <x-input id="contacts" class="block mt-1 w-full" type="text" name="contacts" :value="old('contacts')" required autocomplete="off"/>
            </div>

            <div x-show.transition.duration.700ms="utype =='tenant'" x-transition class="mt-4">
                <x-label for="apartment" :value="__('Apartment')" />

                <select name="appartment_id" id="apartment" class="w-full" x-model="apartment" @change="apartment" @blur="console.log(typeof apartment)">
                    <option value="" selected>Select Apartment</option>
                    @foreach($apartments as $listing)
                        <option value="{{ json_encode($listing['houses']) }}">{{ $listing['name'] }}</option>

                    @endforeach

                </select>
            </div>

        <div x-show.transition.duration.700ms="utype =='tenant' && apartment" x-transition class="mt-4">
                <x-label for="house" :value="__('House Number')" />

                <select name="house_id" id="house" class="w-full">
                    <option value="" selected>Select House no.</option>
                    <template x-if="utype =='tenant' && apartment">
                        <template x-for="house in JSON.parse(apartment)" :key="house.id">
                            <option  :value="house.id" x-text="house.house_number"></option>
                        </template>
                    </template>

                </select>
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Create User') }}
                </x-button>
            </div>
{{--        </div>--}}
    </form>
</x-auth-card>


@endsection
