@extends('layouts.dashboard')

@section('dash-content')

    <div class="md:grid md:grid-cols-2 flex flex-col m-5 pt-16 md:pt-0">
        <div class="relative w-full h-25">
            <x-imagecard class="h-50" :album="$ad->images"/>
        </div>
        <div>description</div>
    </div>
@endsection
