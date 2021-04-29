<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100" x-data="editableForm()">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="p-4 float-right space-x-3">
            <x-button class="bg-blue-500 hover:bg-blue-300" @click="edit=true">Edit</x-button>
            <x-button @click="edit=false" x-show="edit==true">Cancel</x-button>
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
