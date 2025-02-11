@props(['post' => $post])

<a href="{{ route('posts.show', $post->slug) }}" class="group flex flex-col focus:outline-none mt-10">
    <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
        <img src="{{ asset("storage/$post->image_path") }}" alt="{{ $post->title }}"
            class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" />
    </div>

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
            <p
                class="mt-5 inline-flex items-center gap-x-1 text-sm text-lime-500 decoration-2 group-hover:underline group-focus:underline font-medium">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </p>

            @auth
                {{-- Delete post --}}
                <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="mt-5 inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:underline font-medium" onclick="return confirm('Are you sure?')">
                        Delete
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</a>
