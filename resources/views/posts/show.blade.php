<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        {{ $post->title }}
    </x-slot>

    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-2xl">
            <div class="space-y-5 md:space-y-8">
                <div class="flex justify-between">
                    {{-- Go back button --}}
                    <x-posts.go-back-button name="Go back" link="{{ route('posts.index') }}" />

                    {{-- Edit post link --}}
                    <x-posts.go-front-button class="text-lime-500" name="Edit post" link="{{ route('posts.edit', $post->slug) }}" />
                </div>

                <div class="space-y-3">
                    {{-- Title --}}
                    <h2 class="text-2xl font-bold md:text-3xl">{{ $post->title }}</h2>

                    {{-- Body --}}
                    <p class="text-lg text-gray-800">
                        {{ $post->body }}
                    </p>
                </div>

                {{-- Image --}}
                <figure>
                    <img class="w-full object-cover rounded-xl" src="{{ asset("storage/$post->image_path") }}"
                        alt="{{ $post->title }}">
                    <figcaption class="mt-3 text-sm text-center text-gray-500 dark:text-neutral-500">
                    </figcaption>
                </figure>

                {{-- Sources --}}
                <div class="mt-2">
                    <p class="text-md">Source:</p>
                    <a href="{{ $post->source_url }}" target="_blank"
                        class="text-sm text-lime-500">{{ $post->source_title }}</a>
                </div>

                <!-- Pagination -->
                {{-- Pagination between posts next and previous --}}
            </div>
        </div>
    </div>
</x-layouts.app>
