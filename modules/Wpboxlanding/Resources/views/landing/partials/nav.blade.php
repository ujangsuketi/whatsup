<nav x-data="{ mobile: false }" class="relative mt-10 mx-auto md:pb-6 max-w-7xl md:flex md:justify-between md:items-center">
    <div class="relative z-20 flex items-center justify-between">
        <div class="">
            <a class="text-xl font-bold text-gray-800 md:text-2xl hover:text-gray-700" href="/">
                <img style="max-height: 40px" src="{{ config('settings.logo') }}" alt="">
            </a>
        </div>

        <!-- Mobile menu button -->
        <div @click="mobile = !mobile" class="flex md:hidden">
            <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
    <div :class="{ 'hidden' : !mobile, 'flex': mobile }" class="left-0 z-10 items-center justify-center w-full font-semibold select-none md:flex lg:absolute hidden">
        <div class="flex flex-col justify-center w-full mt-4 space-y-2 md:mt-0 md:flex-row md:space-x-6 lg:space-x-10 xl:space-x-16 md:space-y-0">
            <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="{{ config('app.url') }}#features">{{ __('wpbox.features') }}</a>
            <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="{{ config('app.url') }}#demo">{{ __('wpbox.demo') }}</a>
            <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="{{ config('app.url') }}#pricing">{{ __('wpbox.pricing') }}</a>
            <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="{{ config('app.url') }}#faq">{{ __('wpbox.faq') }}</a>
            @if(isset($hasBlog) && $hasBlog)
                <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="{{ config('app.url') }}/blog">{{ __('Blog') }}</a>
            @endif
            @include('wpboxlanding::landing.partials.lang')



        </div>
    </div>

    <!-- Check if logged in -->
    @guest
    <div :class="{ 'flex' : mobile, 'hidden md:flex' : !mobile }" class="relative z-20 flex-col justify-center pr-5 mt-4 space-y-8 md:pr-3 lg:pr-0 md:flex-row md:space-y-0 md:items-center md:space-x-6 md:mt-0 hidden md:flex">
        <a class="flex-shrink-0 font-semibold text-gray-900 hover:underline" href="{{ route('login') }}">{{ __('wpbox.login')}}</a>
        @if (!config('settings.disable_registration_page',false))
        <a href="{{ route('register') }}" class="flex-shrink-0 w-auto text-base font-semibold leading-5 text-left text-gray-800 capitalize bg-transparent md:text-sm md:py-3 md:px-8 md:font-medium md:text-center md:text-white md:bg-gray-900 md:mx-0" data-rounded="" data-primary="gray-900">
            {{ __('wpbox.signup')}}
        </a>
        @endif
    </div>
    @endguest

    @auth
    <div :class="{ 'flex' : mobile, 'hidden md:flex' : !mobile }" class="relative z-20 flex-col justify-center pr-5 mt-4 space-y-8 md:pr-3 lg:pr-0 md:flex-row md:space-y-0 md:items-center md:space-x-6 md:mt-0 hidden md:flex">

        <a href="{{ route('home') }}" class="flex-shrink-0 w-auto text-base font-semibold leading-5 text-left text-gray-800 capitalize bg-transparent md:text-sm md:py-3 md:px-8 md:font-medium md:text-center md:text-white md:bg-gray-900 md:mx-0" data-rounded="" data-primary="gray-900">
            {{ __('wpbox.dashboard')}}
        </a>
    </div>
    @endauth


</nav>