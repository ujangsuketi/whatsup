<section class="relative bg-white tails-selected-element">
    <div class="relative items-center w-full py-12 lg:py-14 mx-auto px-12 lg:px-16 max-w-7xl lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-24 md:bg-slate-200 gap-6 md:p-16 lg:p-20 md:overflow-hidden rounded-[3rem]">
            <div class="max-w-xl mx-auto text-left sm:text-center md:text-left flex justify-center flex-col">
                <div class="">
                    <span class="text-cyan-500 font-semibold">{{ __('Chat with your contact from mobile')}}</span>
                    <h2 class="mt-4 md:mt-12 text-2xl font-semibold text-black lg:text-3xl xl:text-4xl tracking-tighter">{{ __('Say hi to our new mobile app') }}</span></h2>
                    <p class="max-w-xl mt-2 md:mt-4 text-lg lg:text-2xl text-slate-600">{{ __('You are always on the move? No worries. With our new mobile app you can chat with your contact anytime anywhere.')}}</p>
                </div>
                <div class="justify-start flex gap-3 flex-col mt-10 sm:flex-row w-full">

                    @if (strlen(config('wpbox.mobile_app_android_url',"#")) > 5)
                        <a href="{{ config('wpbox.mobile_app_android_url',"#")}}" class="items-center justify-center focus:outline-none border-2 border-black text-white inline-flex bg-black duration-200 focus-visible:outline-black rounded-full focus-visible:ring-black hover:text-black hover:bg-transparent lg:w-auto px-6 py-2.5 text-center w-full" href="#">
                            <span class="">{{ __('Google Play')}}</span>
                        </a>   
                    @endif
                   
                    @if (strlen(config('wpbox.mobile_app_ios_url',"#")) > 5)
                        <a href="{{ config('wpbox.mobile_app_ios_url',"#")}}" class="items-center justify-center focus:outline-none border-2 border-black text-white inline-flex bg-black duration-200 focus-visible:outline-black rounded-full focus-visible:ring-black hover:text-black hover:bg-transparent lg:w-auto px-6 py-2.5 text-center w-full" href="#">
                            <span class="">{{ __('App Store')}}</span>
                        </a>   
                    @endif
                    
                </div>
                
            </div>
            <div class="relative order-last block md:max-w-full max-w-sm mx-auto w-full mt-6 md:mt-0 lg:h-[25rem]">
                <img alt="Phone Mockup" class="relative z-20" src="/uploads/default/wpbox/app.png">
                <div class="absolute inset-0 w-full p-2 lg:p-3 h-full lg:h-[35rem] z-10">
                    <div class="relative w-full h-full bg-gradient-to-b from-slate-400 via-slate-400 to-slate-600 rounded-[4rem] md:rounded-[1.8rem] lg:rounded-[2rem] xl:rounded-[3rem]"></div>
                </div>
            </div>
        </div>
    </div>
</section>