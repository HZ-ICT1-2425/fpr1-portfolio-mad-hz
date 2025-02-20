@props(['post' => $post])

<div class="group flex flex-col focus:outline-none mt-10">
    <a href="{{ route('posts.show', $post->id) }}" class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
        <img src="{{ asset("storage/$post->image_path") }}" alt="{{ $post->title }}"
            class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" />
    </a>

    <div class="mt-7">
        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600">
            {{ $post->title }}
        </h3>

        {{-- Post short body --}}
        <p class="mt-3 text-gray-800">
            {{ substr($post->body, 0, 150) }}...
        </p>

        <div class="flex justify-between">
            {{-- Read more --}}
            <a href="{{ route('posts.show', $post->id) }}"
                class="mt-5 inline-flex items-center gap-x-1 text-sm text-lime-500 decoration-2 group-hover:underline group-focus:underline font-medium">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </a>

            @auth
                {{-- Delete modal --}}
                <x-forms.modal name="{{ $post->title }}" route="{{ route('posts.destroy', $post->id) }}" id="{{ $post->id }}" />

                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium text-red-500 hover:underline focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal"
                    data-hs-overlay="#hs-scale-animation-modal-{{ $post->id }}">
                    Delete
                </button>
            @endauth
        </div>
    </div>
</div>
