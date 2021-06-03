@props(['ad'])
{{--@props(['description','contact','price','location','uuid','images'])--}}
<div class="w-full sm:w-1/2 md:w-72 xl:w-1/3 p-4">
    <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
        <div class="relative h-52 overflow-hidden">
            <x-imagecard :album="$ad->images?->toArray()"/>
        </div>
        <a href="ad/{{ $ad->uuid }}" class="p-4 block">
            <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">Highlight</span>
            <h2 class="mt-2 mb-2  font-bold">{{ $ad->location }}</h2>
        </a>
        <div class="p-4 border-t border-b text-xs text-gray-700">
          <span class="flex items-center mb-1">
            <i class="fas fa-map-marker-alt fa-fw mr-2 text-gray-900"></i> {{ $ad->description }}
          </span>
            <span class="flex items-center">
            <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> Ermäßigung mit Karte
          </span>
        </div>
    </div>
</div>
