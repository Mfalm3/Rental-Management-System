@props(['to','color','fontawesome','location','segment'])

{{--<li class="mr-3 flex-1">--}}
{{--    <a href="{{ $to }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-{{ $color }}-500">--}}
{{--        <i class="{{ $fontawesome }} pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{$slot}}</span>--}}
{{--    </a>--}}
{{--</li>--}}
@php
 $link = (request()->segment(1) == $segment)
? "block py-1 md:py-3 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-".$color."-500 border-".$color."-500"
: "block py-1 md:py-3 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-".$color."-500";

$fa = (request()->segment(1) == $segment)
? "text-".$color."-500"
: ""
@endphp

<li class="mr-3 sm:mt-2 sm:mr-0 sm:text-left sm:px-8">
    <a href="{{ $to }}" {{ $attributes->merge(['class'=> $link]) }}>
        <i class="{{ $fontawesome }} pr-0 md:pr-3" {{ $attributes->merge(['class'=>$fa]) }}></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{$slot}}</span>
    </a>
</li>
