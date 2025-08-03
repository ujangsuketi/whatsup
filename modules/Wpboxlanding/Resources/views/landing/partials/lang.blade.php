<?php
$availableLanguagesENV = config('settings.front_languages');
$exploded = explode(',', $availableLanguagesENV);
$availableLanguages = [];
for ($i = 0; $i < count($exploded); $i += 2) {
    $availableLanguages[$exploded[$i]] = $exploded[$i + 1];
}
$locale =isset($locale)?$locale:(Cookie::get('lang') ? Cookie::get('lang') : config('settings.app_locale'));
?>
@if(isset($availableLanguages)&&count($availableLanguages)>1&&isset($locale))


<div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false"
            class="relative py-3">
            <div
                class="relative z-10 flex items-center space-x-1 text-gray-800 cursor-pointer lg:space-x-3 hover:text-gray-700 focus:outline-none">
                <span class="">
                    @foreach ($availableLanguages as $short => $lang)
                        @if(strtolower($short) == strtolower($locale))<span class="nav-link-inner--text">{{ __($lang) }}</span>@endif
                    @endforeach

                </span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>

            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute left-0 z-20 z-30 w-full p-3 mt-3 -ml-0 space-y-2 overflow-hidden transform bg-white shadow-lg lg:left-1/2 lg:-ml-24 md:w-48 rounded-xl ring-1 ring-black ring-opacity-5"
                data-rounded="rounded-xl" data-rounded-max="rounded-full" style="display: none;">
                @foreach ($availableLanguages as $short => $lang)
                <a href="?lang={{ $short }}"
                    class="block px-4 py-3 text-sm text-gray-700 capitalize cursor-pointer hover:bg-gray-50 rounded-xl hover:text-gray-800"
                    data-rounded="rounded-xl">
                    {{ __($lang) }}
                </a>
                @endforeach
               
            </div>
        </div>
@endif