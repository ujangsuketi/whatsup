<div class="px-8 py-10 mx-auto lg:max-w-screen-xl sm:max-w-xl md:max-w-full sm:px-12 md:px-16 lg:py-20 sm:py-16"
     x-data="{ 
        posts: [],
        async fetchPosts() {
            try {
                const response = await fetch('/api/blog?page=1&limit=3');
                const data = await response.json();
                if (data.status) {
                    this.posts = data.data;
                }
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        }
     }"
     x-init="fetchPosts()">
    <div class="flex justify-between items-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">{{ __('Latest from our blog') }}</h2>
        <a href="/blog" class="inline-flex items-center font-medium underline text-purple-600 hover:text-purple-800">
            {{ __('View all posts') }}
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
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
</div>