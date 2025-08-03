
<div class="flex mt-10 flex-col-reverse items-center w-full p-10 bg-gray-100 md:rounded-xl sm:p-10 md:flex-row" data-rounded="rounded-xl" data-rounded-max="rounded-full">

    <div class="w-full mt-16 md:w-1/2 md:mt-0">
        <img src=" {{ $feature->image_link }}" class="w-full">
    </div>

    <div class="flex flex-col w-full space-y-6 text-center md:w-1/2 px-7 sm:px-0">
        <h2 class="max-w-md mx-auto text-3xl font-semibold md:text-4xl">{{ $feature->title }}</h2>
        <p class="text-gray-600">{{ $feature->description }}</p>
    </div>

</div>