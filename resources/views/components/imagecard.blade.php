@props(['album'])

<div class="absolute inset-0 h-full w-full">

    <div
        class="mx-auto relative"
        x-data='{ activeSlide: 1, visible:false, images:{!! $album !!} }'
    >
        <!-- Slides -->
        <template x-if="images.length === 0">
            <img src="https://res.cloudinary.com/dtyp53cbg/image/upload/v1619016864/rms/default_image.png"
                 class="absolute inset-0 h-auto w-auto object-fill pt-4" alt="Property Image">
        </template>
        <template x-if="images.length !== 0">
            <div>

                <template x-for="image in images" :key="image.id">
                    <div
                        x-show="activeSlide === image.id"
                        class="p-24 font-bold text-5xl h-52 flex items-center bg-white text-white rounded-lg">
                        <img x-show="activeSlide === image.id"
                             :src="image.url"
                             class="absolute inset-0 h-auto w-auto object-cover pt-4"
                             alt="Property Image"
                        />
                    </div>
                </template>

                <!-- Prev/Next Arrows -->
                <div class="absolute inset-0 flex" x-show="visible">
                    <div class="flex items-center justify-start w-1/2">
                        <button
                            class="bg-red-600 text-teal-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12"
                            x-on:click="activeSlide = activeSlide === 1 ? images.length : activeSlide - 1">
                            &#8592;
                        </button>
                    </div>
                    <div class="flex items-center justify-end w-1/2">
                        <button
                            class="bg-red-600 text-teal-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12"
                            x-on:click="activeSlide = activeSlide === images.length ? 1 : activeSlide + 1">
                            &#8594;
                        </button>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="absolute bottom-0 w-full flex items-center justify-center px-4">
                    <template x-for="image in images" :key="image.id">
                        <button
                            class="flex w-2 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-red-400 hover:shadow-lg"
                            :class="{
              'bg-red-600': activeSlide === image.id,
              'bg-gray-700': activeSlide !== image.id
          }"
                            x-on:click="activeSlide = image.id"
                        ></button>
                    </template>
                </div>
            </div>
        </template>
    </div>

</div>
