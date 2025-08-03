<section id="faq" class="py-16 bg-white md:py-20 lg:py-24 " data-tails-scripts="//unpkg.com/alpinejs" >
    <div class="max-w-5xl px-12 mx-auto xl:px-0">

        <h2 class="text-3xl font-black md:text-4xl lg:text-6xl xl:text-7xl">{{ __('wpbox.faq_title') }}</h2>
        <p class="mt-4 text-xl font-thin text-gray-700 lg:text-2xl">{{ __('wpbox.faq_subtitle') }}</p>

        <div class="relative mt-12 space-y-3">

            <!-- Questions -->

            @foreach ($faqs as $faq)
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>{{$faq->title}}</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{{$faq->description}}</p>
                </div>
            @endforeach
           

        </div>

    </div>
</section>