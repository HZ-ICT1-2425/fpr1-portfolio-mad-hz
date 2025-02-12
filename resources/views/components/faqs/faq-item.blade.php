@props(['faq' => $faq])

<div class="hs-accordion hs-accordion-active:bg-gray-100 rounded-xl p-6"
    id="hs-basic-with-title-and-arrow-stretched-heading-two">
    <button
        class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-start text-gray-800 rounded-lg transition hover:text-gray-500 focus:outline-none focus:text-gray-500"
        aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-two">
        {{ $faq->question }} <svg
            class="hs-accordion-active:hidden block shrink-0 size-5 text-gray-600 group-hover:text-gray-500"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
        </svg>
        <svg class="hs-accordion-active:block hidden shrink-0 size-5 text-gray-600 group-hover:text-gray-500"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
        </svg>
    </button>
    <div id="hs-basic-with-title-and-arrow-stretched-collapse-two"
        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region"
        aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-two">
        <p class="text-gray-800">
            {{ $faq->answer }}
        </p>
        <div class="text-sm mt-2">
            More info: <a href="{{ $faq->source_url }}" target="_blank"
                class="text-lime-500">{{ $faq->source_title }}</a>
        </div>

        @auth
            <div class="flex mt-5 text-sm">
                <form action="{{ route('faqs.destroy', $faq) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="text-red-500 mr-2 hover:underline">Delete</button>
                </form>

                <a href="{{ route('faqs.edit', $faq) }}" class="text-blue-500 hover:underline">Edit Faq</a>
            </div>
        @endauth
    </div>
</div>
