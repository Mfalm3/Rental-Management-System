@extends('layouts.dashboard')

@section('dash-content')

    <ul>
        @foreach($ads as $ad)
            <li>{{ $ad->id }} {{ substr_replace($ad->description,'...', 0, 35) }} {{ $ad->location }}</li>
        @endforeach
    </ul>
@endsection
