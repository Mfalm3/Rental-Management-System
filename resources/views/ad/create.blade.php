@extends('layouts.dashboard')

@section('dash-content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="flex flex-wrap">
                <div class="w-full xl:p-10 m-auto">
                    <h3 class="text-center my-4">Create a new Ad listing</h3>
                    <hr class="mb-3">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <x-label for="name" :value="__('Ad Description')" />

                            <textarea id="name" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3">
                            <x-label for="name" :value="__('Location')" />

                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="off"/>
                        </div>
                        <div class="mb-3">
                            <x-label for="name" :value="__('Price')" />

                            <x-input id="location" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="off"/>
                        </div>
                        <div class="mb-3">
                            <x-label for="ac_no" :value="__('Contact Number')" />

                            <x-input id="ac_no" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" autocomplete="off"/>
                        </div>

                        <div class="mb-3">
                            <x-label for="image" :value="__('Image files')"></x-label>
                            <x-input type="file" name="images[]" multiple required/>
                        </div>
                        <div class="mt-4 float-right">
                            <x-button>Submit</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
