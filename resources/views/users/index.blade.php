@extends('layouts.dashboard')

@section('dash-content')

    <div class="container">
        <div class="p-4 m-4">
            <div class="bg-white">
                <nav class="flex flex-col sm:flex-row justify-between">
                    <button class="tab text-gray-600 py-4 px-6 block border-b-2 border-r-2 hover:text-blue-500 focus:outline-none md:w-1/3 active"
                            data-target="tenant-panel"
                    >
                        Tenants
                    </button>
                    <button class="tab text-gray-600 py-4 px-6 block border-b-2 border-r-2 hover:text-blue-500 focus:outline-none md:w-1/3"
                            data-target="landlord-panel"
                    >
                        Landlords
                    </button>
                    <button class="tab text-gray-600 py-4 px-6 block border-b-2 hover:text-blue-500 focus:outline-none md:w-1/3"
                            data-target="agent-panel"
                    >
                        Agents
                    </button>
                </nav>
            </div>
            <div id="panels">
                <div class="tenant-panel tab-content active py-5 bg-white">
                    @if($landlords->count() > 0)
                        @foreach($tenants as $tenant)
                            <li>{{ $tenant->name }}</li>
                        @endforeach
                    @else
                        <li>No Agent registered</li>
                    @endif
                </div>
                <div class="landlord-panel tab-content py-5 bg-white">
                    @if($landlords->count() > 0)
                        @foreach($landlords as $landlord)
                            <li>{{ $landlord->name }}</li>
                        @endforeach
                    @else
                        <li>No Landlord registered</li>
                    @endif
                </div>
                <div class="agent-panel tab-content py-5 bg-white">
                    @if($agents->count() > 0)
                        @foreach($agents as $agent)
                            <li>{{ $agent->name }}</li>
                        @endforeach
                    @else
                        <li>No Agent registered</li>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
