<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100" x-data="editableForm()">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="p-4 float-right space-x-3">
            <x-button class="bg-blue-500 hover:bg-blue-700" @click="edit=true">Edit</x-button>
            <x-button @click.debounce="edit=false" x-show="edit==true"
                      x-transition:enter="transition ease-in-out duration-700"
                      x-transition:enter-start="opacity-0 transform scale-90"
                      x-transition:enter-end="opacity-100 transform scale-100"
                      x-transition:leave="transition ease-in duration-300"
                      x-transition:leave-start="opacity-100 transform scale-100"
                      x-transition:leave-end="opacity-0 transform scale-90"
            >Cancel</x-button>
        </div>

        {{ $slot }}

    </div>
</div>

<script>
    function editableForm(){
        return {
            edit:false
        }
    }
</script>
