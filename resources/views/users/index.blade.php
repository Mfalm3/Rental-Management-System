@extends('layouts.app')
@php
    $header = 'All Users';
    $header.= "<a href='/users/create' class='inline-flex float-right w-auto justify-self-end rounded-pill bg-blue-700 p-2 ring ring-gray-100 text-white'>Create User</a>";
@endphp
@section('content')

    <div class="container">
        <div>
            <ul>
                @foreach($users as $user)
                    <li><strong>{{ explode('\\',$user->typeable_type,3)[2] }}</strong> {{ $user->name}}</li>
                @endforeach
            </ul>

        </div>
    </div>

@endsection
