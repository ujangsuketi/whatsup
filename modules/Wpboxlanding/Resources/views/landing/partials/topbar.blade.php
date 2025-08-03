@if (strlen(__('wpbox.schedule_a_call_link')) > 0)
<div class="absolute top-0 left-0 w-full h-3 bg-gradient-to-r from-indigo-600 via-blue-500 to-green-400 mb-5"
data-primary="indigo-600">

<div
    class="z-20 flex items-center justify-center w-full h-10 px-5 overflow-hidden text-xs font-normal cursor-pointer bg-gradient-to-r from-indigo-500 via-blue-400 to-green-400 text-blue-50">
    <a href="{{ __('wpbox.schedule_a_call_link')}}"><div class="flex items-center justify-center w-full h-full mx-auto max-w-7xl">
        
        <svg class="w-4 h-4 mr-1 text-blue-100 stroke-current" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
            </path>
        </svg>
        <span class=""><span class=" sm:inline-block text-md font-bold">{{ __('wpbox.schedule_a_call') }}</span>
    </div>
    </a>

</div>

</div> 
@endif



    

