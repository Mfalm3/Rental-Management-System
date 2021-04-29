@extends('layouts.dashboard')

@section('dash-content')
    <div class="bg-gray-800 pt-3">
        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between">
            <h3 class="font-bold pl-2">Manage Agent {{ $user->name }}'s details</h3>
        </div>
    </div>

    <x-editable-form-card>
        <form action="{{route('users.update',['user' => $user, 'type'=> $user->typeable_type])}}" method="POST">
            @method('PUT')
            @csrf
            <div class="clear-right">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required ::class="{'disabled': !edit}" ::disabled="!edit" autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required ::class="{'disabled': !edit}" ::disabled="!edit" required autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-label for="contacts" :value="__('Contacts')" />

                <x-input id="contacts" class="block mt-1 w-full" type="text" name="contacts" :value="$user->typeable->contacts" required ::class="{'disabled': !edit}" ::disabled="!edit" required autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password"
                         class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation"
                         class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation"
                         required />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Update User Details') }}
                </x-button>
            </div>
        </form>
    </x-editable-form-card>
@endsection
