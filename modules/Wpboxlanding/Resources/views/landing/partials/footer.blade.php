<section class="text-gray-700 bg-white body-font " >
    <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
        <a href="#_" class="text-xl font-black leading-none text-gray-900 select-none logo">{{ config('app.name')}}<span class="text-green-600">.</span></a>
        <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">© {{ date('Y')}} {{ __('wpbox.slogan')}}
        </p>
        <span class="inline-flex justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">
           @include('wpboxlanding::landing.partials.links')
        </span>
    </div>
</section>