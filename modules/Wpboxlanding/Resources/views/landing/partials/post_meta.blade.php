
    {{-- Primary Meta Tags --}}
    <meta name="title" content="{{ $data['data']['title'] }}">
    <meta name="description" content="{{ $data['data']['excerpt'] }}">
    <meta name="keywords" content="{{ $data['data']['meta_keywords'] }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $data['data']['title'] }}">
    <meta property="og:description" content="{{ $data['data']['excerpt'] }}">
    @if($data['data']['featured_image'])
        <meta property="og:image" content="{{ $data['data']['featured_image'] }}">
    @endif

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $data['data']['title'] }}">
    <meta name="twitter:description" content="{{ $data['data']['excerpt'] }}">
    @if($data['data']['featured_image'])
        <meta name="twitter:image" content="{{ $data['data']['featured_image'] }}">
    @endif

    {{-- Article Specific Meta --}}
    <meta property="article:published_time" content="{{ $data['data']['created_at'] }}">
    @if($data['data']['updated_at'])
        <meta property="article:modified_time" content="{{ $data['data']['updated_at'] }}">
    @endif

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">
