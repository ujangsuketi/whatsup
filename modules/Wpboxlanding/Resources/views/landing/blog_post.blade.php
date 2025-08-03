<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('wpboxlanding::landing.partials.post_meta')
    
    <!-- RTL and Commmon ( Phone ) -->
    @include('layouts.rtl')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <!-- Add Disqus CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS defined by admin -->
    <link type="text/css" href="{{ asset('byadmin') }}/front.css" rel="stylesheet">
</head>
<body class="landing-page">
    <section id="top" class="w-full px-6 pt-3 overflow-hidden bg-white xl:px-8 " data-tails-scripts="//unpkg.com/alpinejs">

        @include('wpboxlanding::landing.partials.topbar')
        @include('wpboxlanding::landing.partials.nav')
    </section>
    
    @include('wpboxlanding::landing.partials.post')

    <!-- Social Share Buttons -->
    <div class="flex justify-center space-x-4 my-8">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="text-blue-600 hover:text-blue-800">
            <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank" class="text-blue-400 hover:text-blue-600">
            <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" target="_blank" class="text-blue-700 hover:text-blue-900">
            <i class="fab fa-linkedin fa-2x"></i>
        </a>
    </div>

    <!-- Disqus Comments -->
    <div id="disqus_thread" class="max-w-4xl mx-auto px-4 my-8"></div>
    <script>
        var disqus_config = function () {
            this.page.url = '{{ url()->current() }}';
            this.page.identifier = '{{ Request::path() }}';
        };
        (function() {
            var d = document, s = d.createElement('script');
            s.src = 'https://{{ config('blog.disqus_shortname') }}.disqus.com';  // Replace with your Disqus shortname
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <!-- AlpineJS Library -->
    <script src="{{ asset('vendor') }}/alpine/alpine.js"></script>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('vendor') }}/jquery/jquery.min.js" type="text/javascript"></script>

    <!-- All in one -->
    <script src="{{ asset('custom') }}/js/js.js?id={{ config('version.version')}}s"></script>

    <!-- Custom JS defined by admin -->
    <?php echo file_get_contents(base_path('public/byadmin/front.js')) ?>
</body>
</html>