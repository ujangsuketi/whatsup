<section id="testimonials" class="w-full bg-gray-50 sm:py-16 py-12 md:py-20 relative " >
    <div class="max-w-7xl mx-auto px-10">
        <div class="flex flex-col mb-7 sm:mb-20 items-start md:items-center justify-center">
            <p class="sm:tracking-widest sm:text-base text-sm uppercase font-medium text-gray-500">{{ __('wpbox.what_people_say') }}</p>
            <h2 class="text-gray-900 mt-2 text-2xl sm:text-4xl tracking-tight font-bold sm:font-extrabold md:text-5xl dark:text-white">{{ __('wpbox.dont_take_our_word') }}</h2>
            <div class="mt-1 md:mt-4 items-center flex text-blue-600">
                <svg class="w-8 h-8 sm:block hidden mr-1.5 mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                <p class="text-xl md:text-4xl tracking-tight sm:font-bold sm:text-3xl">{{ __('wpbox.view_testimonials') }}</p>
            </div>
        </div>
        <div class="grid grid-cols-4 sm:grid-cols-8 lg:grid-cols-12 gap-6 w-full">
            <div class="col-span-4 space-y-6">
                @foreach ($testimonials as $key => $testimonial)
                    <!-- if mod of $key -->
                    @if ($key % 3 == 0)
                        @include('wpboxlanding::landing.partials.testimonial') 
                    @endif
                @endforeach
            </div>

            <div class="col-span-4 sm:block hidden space-y-5">
                @foreach ($testimonials as $key => $testimonial)
                    <!-- if mod of $key -->
                    @if ($key % 3 == 1)
                        @include('wpboxlanding::landing.partials.testimonial') 
                    @endif
                @endforeach
            </div>

            <div class="col-span-4 lg:block hidden space-y-5">
                @foreach ($testimonials as $key => $testimonial)
                    <!-- if mod of $key -->
                    @if ($key % 3 == 2)
                        @include('wpboxlanding::landing.partials.testimonial') 
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</section>