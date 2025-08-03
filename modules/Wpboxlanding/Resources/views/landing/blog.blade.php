<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name','WhatsBox') }} {{ __('Blog') }}</title>
   
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
    
    <!-- RTL and Commmon ( Phone ) -->
    @include('layouts.rtl')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <!-- Custom CSS defined by admin -->
    <link type="text/css" href="{{ asset('byadmin') }}/front.css" rel="stylesheet">
</head>
<body class="landing-page">
    <section id="top" class="w-full px-6 pt-3 overflow-hidden bg-white xl:px-8 " data-tails-scripts="//unpkg.com/alpinejs">

        @include('wpboxlanding::landing.partials.topbar')
        @include('wpboxlanding::landing.partials.nav')
    </section>
    
    <div class="px-8 py-10 mx-auto lg:max-w-screen-xl sm:max-w-xl md:max-w-full sm:px-12 md:px-16 lg:py-20 sm:py-16"
         x-data="{ 
            posts: [],
            pagination: {},
            currentPage: 1,
            async fetchPosts(page = 1) {
                try {
                    const response = await fetch(`/api/blog?page=${page}&limit=9`);
                    const data = await response.json();
                    if (data.status) {
                        this.posts = data.data;
                        this.pagination = data.pagination;
                        this.currentPage = parseInt(data.pagination.current_page);
                    }
                } catch (error) {
                    console.error('Error fetching posts:', error);
                }
            }
         }"
         x-init="fetchPosts()">
        
        <div class="grid gap-x-8 gap-y-12 sm:gap-y-16 md:grid-cols-2 lg:grid-cols-3">
            <template x-for="post in posts" :key="post.id">
                <div class="relative">
                    <a :href="'/blog/' + post.slug" class="block overflow-hidden group rounded-xl">
                        <img :src="post.featured_image" class="object-cover w-full h-56 transition-all duration-300 ease-out sm:h-64 group-hover:scale-110" :alt="post.title">
                    </a>
                    <div class="relative mt-5">
                        <div class="flex justify-between items-center mb-2.5">
                            <p class="uppercase font-semibold text-xs text-purple-600" x-text="new Date(post.created_at).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })"></p>
                            <p class="uppercase font-semibold text-xs text-gray-500" x-text="`${post.read_time} {{ __('min read') }}`"></p>
                        </div>
                        <a :href="'/blog/' + post.slug" class="block mb-3 hover:underline">
                            <h2 class="text-2xl font-bold leading-7 text-black transition-colors duration-200 hover:text-deep-purple-accent-700" 
                                x-text="post.title">
                            </h2>
                        </a>
                        <p class="mb-4 text-gray-700" x-text="post.excerpt"></p>
                        <a :href="'/blog/' + post.slug" class="font-medium underline">{{ __('Read More') }}</a>
                    </div>
                </div>
            </template>
        </div>

        <!-- Add this pagination component after the grid div -->
        <div class="flex justify-center mt-12">
            <nav class="flex items-center space-x-2" aria-label="Pagination">
                <!-- Previous button -->
                <button 
                    @click="fetchPosts(currentPage - 1)"
                    :disabled="currentPage === 1"
                    :class="{'opacity-50 cursor-not-allowed': currentPage === 1}"
                    class="px-3 py-2 rounded-md bg-white border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    {{ __('Previous') }}
                </button>
                
                <!-- Page numbers -->
                <template x-for="page in parseInt(pagination.last_page)" :key="page">
                    <button 
                        @click="fetchPosts(page)"
                        :class="{'bg-purple-600 text-white': currentPage === page, 'bg-white text-gray-700': currentPage !== page}"
                        class="px-4 py-2 rounded-md border border-gray-300 text-sm font-medium hover:bg-gray-50"
                        x-text="page">
                    </button>
                </template>

                <!-- Next button -->
                <button 
                    @click="fetchPosts(currentPage + 1)"
                    :disabled="currentPage === parseInt(pagination.last_page)"
                    :class="{'opacity-50 cursor-not-allowed': currentPage === parseInt(pagination.last_page)}"
                    class="px-3 py-2 rounded-md bg-white border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    {{ __('Next') }}
                </button>
            </nav>
        </div>
    </div>

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