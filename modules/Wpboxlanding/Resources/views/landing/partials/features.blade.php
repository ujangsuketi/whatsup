<section id="features" class="pt-12 pb-8 bg-gray-100  leading-7 text-gray-900 bg-white border-b border-solid md:pt-24 md:pb-12 box-border border-slate-100 " >
    <div class="relative px-12 mx-auto w-full max-w-7xl text-gray-900 box-border">
        <div class="flex flex-wrap -mx-5 mt-0 box-border">
            @foreach ($mainfeatures as $mainfeature)
                <div class="relative flex-none px-5 mt-0 w-full max-w-full md:w-1/3 md:flex-none box-border">
                    <div class="mb-3">
                        <img class="h-20 -ml-1" src="{{ $mainfeature->image_link }}">
                    </div>
                    <h3 class="mt-0 mb-2 text-xl tracking-normal box-border">{{ $mainfeature->title }}</h3>
                    <p class="mt-0 mb-8 md:mb-0 box-border text-slate-400">{{ $mainfeature->description }}</p>
                </div>
            @endforeach
            
        </div>
    </div>
  
  
</section>