@extends('layouts.app', ['title' => __('Themes')])
@section('content')
<div class="header pb-8 pt-2 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">🎨 {{__('Icon Style')}}</h2>
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="">
                                <div class="form-group">
                                    <label class="form-control-label">{{__('Select Icon Type')}}</label>
                                    <select name="icon_type" class="form-control select2" onchange="this.form.submit()">
                                        <option value="nucleo" {{ config('settings.icon_type','nucleo') == 'nucleo' ? 'selected' : '' }}>
                                            🎯 Nucleo Icons
                                        </option>
                                        <option value="hero" {{ config('settings.icon_type','nucleo') == 'hero' ? 'selected' : '' }}>
                                            ⚡ Hero Icons
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-body mt-5">
            <h1 class="mb-4 mt-3">🎨 {{__('Themes')}}</h1>

            @include('partials.flash')

            <div class="row pt-2">
                @foreach($themes as $theme)
                <div class="col-md-4 mb-4">
                    <div class="theme-card card h-100 transition-all hover:shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="mb-0">{{ $theme['name'] }}</h3>
                            </div>
                            <p class="text-muted mb-4">{{ $theme['description'] }}</p>
                            <div class="theme-preview p-3 rounded mb-4">
                                <div class="color-palette d-flex">
                                    <div class="color-swatch" style="background: {{ $theme['colors']['primary'] }}"></div>
                                    <div class="color-swatch" style="background: {{ $theme['colors']['secondary'] }}"></div>
                                    <div class="color-swatch" style="background: {{ $theme['colors']['tertiary'] }}"></div>
                                </div>
                            </div>
                            <a href="?theme={{ $theme['file'] }}" class="btn btn-secondary w-100 theme-button">
                                <i class="fas fa-check me-2"></i>{{__('Set Theme')}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.theme-card {
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.theme-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
}

.color-palette {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.color-swatch {
    width: 33.333%;
    height: 120px;
    border-radius: 0;
    box-shadow: none;
}

.theme-preview {
    background: rgba(0,0,0,0.03);
    border-radius: 15px;
}

.theme-active-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #ddd;
}

.theme-card.active .theme-active-indicator {
    background: var(--primary);
    border-color: var(--primary);
}

.text-gradient {
    background: linear-gradient(45deg, var(--primary), var(--info));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.theme-button {
    transition: all 0.3s ease;
}

.theme-button:hover {
    transform: translateY(-2px);
}
</style>
@endsection
