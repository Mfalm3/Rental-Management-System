@props(['album'])

<div class="absolute inset-0 h-full w-full">
    <div
        class="mx-auto relative"
        x-data='{
            activeSlide: 1,
            visible:false,
            images: {{ json_encode($album) }},
            slides: {{ count($album) }} }'
    >
        <!-- Slides -->
        <template x-if="images.length === 0">
            <img src="https://res.cloudinary.com/dtyp53cbg/image/upload/v1619016864/rms/default_image.png"
                 class="absolute inset-0 h-auto w-auto object-fill pt-4" alt="Property Image">
        </template>
        <template x-if="images.length !== 0">
            <div class="group">

                <template x-for="(image, index) in images" :key="index">
                    <div
                        x-show="activeSlide === (index + 1)"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="p-24 font-bold text-5xl h-52 flex items-center bg-white text-white rounded-lg">

                        <img x-show="activeSlide === (index + 1)"
                             :src="image.url"
                             class="absolute inset-0 h-auto w-full object-cover"
                             alt="Property Image"
                        />
                    </div>
                </template>

                <!-- Prev/Next Arrows -->
                <div class="absolute inset-0 flex invisible group-hover:visible"
                     x-show="visible = images.length > 1">
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
                <div class="absolute bottom-0 w-full flex items-center justify-center p-4"
                     x-show="visible = images.length > 1">
                    <template x-for="(image, index) in images" :key="index">
                        <button
                            class="flex w-2 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-red-400 hover:shadow-lg"
                            :class="{
                                       'bg-red-600': activeSlide === (index + 1),
                                       'bg-gray-700': activeSlide !== (index + 1)
                                     }"
                            x-on:click="activeSlide = (index + 1)"
                        ></button>
                    </template>
                </div>
            </div>
        </template>
    </div>

</div>
