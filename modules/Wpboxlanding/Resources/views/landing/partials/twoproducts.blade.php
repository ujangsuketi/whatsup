<div class="flex flex-col mt-10 md:flex-row md:mt-8 md:space-x-8">
    <div class="flex flex-col items-center justify-center flex-1 overflow-hidden text-center bg-gray-100 md:rounded-xl" data-rounded="rounded-xl" data-rounded-max="rounded-full">
        <img src="{{ $feature->image_link }}" class="w-2/3 mt-5">
        <div class="flex flex-col px-10 pb-24 space-y-6 pt-14 md:px-24 ">
            <p class="text-3xl font-semibold leading-none md:text-4xl">{{ $feature->title }}</p>
            <p class="font-light text-gray-600">{{ $feature->description }}</p>
        </div>
       
    </div>
    <div class="relative flex flex-col items-center flex-1 mt-10 overflow-hidden text-center bg-gray-100 md:rounded-xl md:mt-0" data-rounded="rounded-xl" data-rounded-max="rounded-full">
        <img src="{{ $feature2->image_link }}" class="w-2/3 mt-5">
        <div class="flex flex-col px-10 pb-24 space-y-6 pt-14 md:px-24">
            <p class="text-3xl font-semibold leading-none md:text-4xl">{{ $feature2->title }}</p>
            <p class="font-light text-gray-600">{{ $feature2->description }}</p>
        </div>
       
    </div>
</div>