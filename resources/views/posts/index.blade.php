<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        Blog
    </x-slot>

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <x-shared.header title="Insights" text="A chronological journal about the HBO-ICT program." />

            {{-- Create a post link --}}
            <div class="flex justify-between mb-2">
                <span>Showing {{ $posts->lastItem() ?? 0 }} out of {{ $posts->total() }} posts</span>
                @auth
                    <x-forms.create-link title="Create a post" link="{{ route('posts.create') }}" />
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
