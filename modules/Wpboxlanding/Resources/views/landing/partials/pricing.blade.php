<section id="pricing" class="relative py-20 bg-gray-100 ">
    <div class="relative px-10 mx-auto max-w-7xl xl:px-16">
        <div class="max-w-3xl mx-auto mb-12 text-center lg:mb-20">
            <span class="text-sm font-semibold text-green-500">{{ __('wpbox.our_subscription_plans') }}</span>
            <h2 class="mt-3 mb-10 text-4xl font-bold font-heading">{{ __('wpbox.simple_flexible_pricing') }}</h2>
            <p class="mb-16 text-xl text-gray-500">{{ __('wpbox.subscription_plans_description') }}</p>
        </div>

        @foreach ($plans as $keyp => $plan)
        @if ($keyp % 2 ==0)
        <div class="px-6 py-6 mb-6 lg:pl-12 lg:pr-6 bg-gray-50 rounded-xl">
            <div class="flex flex-col justify-between lg:flex-row">
                <div class="w-full px-4 mb-4 lg:w-7/12 xl:w-8/12 lg:mb-0">
                    <div class="max-w-xl pt-4 lg:pt-6">
                        <div class="max-w-md mb-10">
                            <h2 class="text-3xl font-semibold md:text-4xl font-heading">{{ $plan->name }}</h2>
                        </div>
                        <p class="mb-10 text-xl text-gray-500">{{ $plan->description }}</p>
                        <ul class="flex flex-wrap text-base text-left lg:text-lg">

                            @foreach (explode(",",$plan['features']) as $feature)
                            <li class="flex items-center w-full mb-6 sm:w-1/2">
                                <svg class="mr-2 text-blue-400 w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-medium">{{ $feature }}</p>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-5/12 2xl:w-4/12">
                    <div class="h-full p-12 text-center bg-white rounded-xl">
                        <span class="inline-block px-3 py-1 mb-4 rounded bg-blue-50">
                            <h3 class="text-xs font-semibold text-blue-500">{{ __('wpbox.plan_title',['plan'=>$plan->name]) }}</h3>
                        </span>
                        <p class="mb-6 text-gray-500 lg:mb-12">{{ __('wpbox.plan_subscribe_info',['plan'=>$plan->name])  }}</p>
                        <div class="flex justify-center mb-12">
                            <span class="self-start inline-block mr-1 text-xl font-semibold text-gray-500">{{ config('money')[strtoupper(config('settings.cashier_currency'))]['symbol'] }}</span>
                            <p class="self-end text-5xl font-semibold font-heading">{{ $plan->price }}<span class="ml-1 text-sm">/ {{ $plan['period'] == 1? __('month') :  __('year') }}</span></p>
                        </div>
                        @if (!config('settings.disable_registration_page',false))
                        <a class="block py-4 mb-4 text-sm font-medium leading-normal text-center text-white transition duration-200 bg-blue-400 rounded hover:bg-blue-300" href="{{ route('register') }}">{{ __('wpbox.start_now')}}</a>
                        @endif
                        <p class="text-xs text-gray-500">
                            {{ __('wpbox.no_contracts')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @else

        <div class="px-6 py-6 mb-6 lg:pl-12 lg:pr-6 bg-gray-50 rounded-xl">
            <div class="flex flex-col justify-between lg:flex-row">
                <div class="w-full px-4 mb-4 lg:w-7/12 xl:w-8/12 lg:mb-0">
                    <div class="max-w-xl pt-4 lg:pt-6">
                        <div class="max-w-md mb-10">
                            <h2 class="text-3xl font-semibold md:text-4xl font-heading">{{ $plan->name }}</h2>
                        </div>
                        <p class="mb-10 text-xl text-gray-500">{{ $plan->description }}</p>
                        <ul class="flex flex-wrap text-base text-left lg:text-lg">

                            @foreach (explode(",",$plan['features']) as $feature)
                            <li class="flex items-center w-full mb-6 sm:w-1/2">
                                <svg class="mr-2 text-green-400 w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="font-medium">{{ $feature }}</p>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-5/12 2xl:w-4/12">
                    <div class="h-full p-12 text-center bg-white rounded-xl">
                        <span class="inline-block px-3 py-1 mb-4 rounded bg-green-50">
                            <h3 class="text-xs font-semibold text-green-500">{{ __('wpbox.plan_title',['plan'=>$plan->name]) }}</h3>
                        </span>
                        <p class="mb-6 text-gray-500 lg:mb-12">{{ __('wpbox.plan_subscribe_info',['plan'=>$plan->name])  }}</p>
                        <div class="flex justify-center mb-12">
                            <span class="self-start inline-block mr-1 text-xl font-semibold text-gray-500">{{ config('money')[strtoupper(config('settings.cashier_currency'))]['symbol'] }}</span>
                            <p class="self-end text-5xl font-semibold font-heading">{{ $plan->price }}<span class="ml-1 text-sm">/ {{ $plan['period'] == 1? __('month') :  __('year') }}</span></p>
                        </div>
                        @if (!config('settings.disable_registration_page',false))
                        <a class="block py-4 mb-4 text-sm font-medium leading-normal text-center text-white transition duration-200 bg-green-400 rounded hover:bg-green-300" href="{{ route('register') }}">{{ __('wpbox.start_now')}}</a>
                        @endif
                        <p class="text-xs text-gray-500">
                            {{ __('wpbox.no_contracts')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        @endif

        @endforeach

    </div>
</section>