<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        Blog
    </x-slot>

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <div class="max-w-2xl text-center mx-auto mb-10">
                <h1
                    class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl bg-clip-text bg-gradient-to-tl from-blue-500 to-lime-400 text-transparent py-4">
                    Insights
                </h1>
                <p class="mt-1 text-gray-600">
                    A chronological journal about the HBO-ICT program.
                </p>
            </div>

            {{-- Create a post link --}}
            <div class="flex justify-between mb-2">
                <span>Showing {{ $posts->lastItem() }} out of {{ $posts->total() }} posts</span>
                @auth
                    <a href="{{ route('posts.create') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-lime-600 hover:text-lime-600 focus:outline-none focus:border-lime-600 focus:text-lime-600 disabled:opacity-50 disabled:pointer-events-none">
                        Create a post
                    </a>
                @endauth
            </div>

            {{-- List of blogs --}}
            @if ($posts->count() <= 0)
                <div class="text-center font-medium text-xl mt-2">There are no posts yet.</div>
            @else
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($posts as $post)
                        <x-posts.post-card :post="$post"></x-posts.post-card>
                    @endforeach
                </div>

                <div class="flex justify-center mt-10">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
