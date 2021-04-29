@extends('layouts.dashboard')

@section('dash-content')

    <div class="bg-gray-800 pt-3">
        <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between">
            <h3 class="font-bold pl-2">Manage Users</h3>
            <a href="{{ route('users.create') }}" class="bg-blue-600 rounded p-2 ring-2 ring-blue-400 text-sm transform hover:-translate-y-0.5 hover:ring-blue-500">Add new user</a>
        </div>
    </div>

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
            <div id="panels" class="bg-white">
                <div class="tenant-panel tab-content active py-1">
                    @if($landlords->count() > 0)
                        @foreach($tenants as $tenant)
                            <x-list-item>
                                <a href="{{ route('users.show',['type' => 'tenant','user' => $tenant]) }}">
                                    {{ $tenant->name }}
                                </a>
                            </x-list-item>
                        @endforeach
                    @else
                        <li>No Tenant registered</li>
                    @endif
                </div>
                <div class="landlord-panel tab-content py-1">
                    @if($landlords->count() > 0)
                        @foreach($landlords as $landlord)
                            <x-list-item>
                                <a href="{{ route('users.show',['type' => 'landlord','user' => $landlord]) }}">
                                    {{ $landlord->name }}
                                </a>
                            </x-list-item>
                        @endforeach
                    @else
                        <li>No Landlord registered</li>
                    @endif
                </div>
                <div class="agent-panel tab-content py-1">
                    @if($agents->count() > 0)
                        @foreach($agents as $agent)
                            <x-list-item>
                                <a href="{{ route('users.show',['type' => 'agent','user' => $agent]) }}">
                                    {{ $agent->name }}
                                </a>
                            </x-list-item>
                        @endforeach
                    @else
                        <li>No Agent registered</li>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
