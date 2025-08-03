<article class="max-w-7xl mx-auto px-4 py-8">
    {{-- Back to Blog Link --}}
    <div class="mb-8">
        <a href="/blog" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            {{ __('Back to Blog') }}
        </a>
    </div>

    {{-- Header Section --}}
    <header class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $data['data']['title'] }}</h1>
        <div class="flex items-center text-gray-600 text-sm">
            <time datetime="{{ $data['data']['created_at'] }}">
                {{ \Carbon\Carbon::parse($data['data']['created_at'])->format('F j, Y') }}
            </time>
            <span class="mx-2">•</span>
            <span>{{ $data['data']['read_time'] }} min read</span>
        </div>
    </header>

    {{-- Featured Image --}}
    @if($data['data']['featured_image'])
        <div class="mb-8">
            <img src="{{ $data['data']['featured_image'] }}" 
                 alt="{{ $data['data']['title'] }}" 
                 class="w-full h-auto rounded-lg shadow-lg">
        </div>
    @endif

    {{-- Excerpt --}}
    @if($data['data']['excerpt'])
        <div class="text-xl text-gray-600 mb-8 font-light bg-gray-50 border-l-4 border-blue-500 p-6 rounded-r-lg">
            {{ $data['data']['excerpt'] }}
        </div>
    @endif

    {{-- Main Content --}}
    <div class="prose prose-lg max-w-none">
        {!! $data['data']['content'] !!}
    </div>

    {{-- Meta Information --}}
    @if($data['data']['meta_keywords'])
        <div class="mt-8 pt-8 border-t border-gray-200">
            <div class="text-sm text-gray-600">
                <span class="font-semibold">Keywords:</span> 
                {{ $data['data']['meta_keywords'] }}
            </div>
        </div>
    @endif
</article>
