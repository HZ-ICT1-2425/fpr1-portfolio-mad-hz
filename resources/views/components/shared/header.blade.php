@props(['title', 'text'])

<div class="max-w-2xl text-center mx-auto mb-10">
    <h2
        class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl bg-clip-text bg-gradient-to-tl from-blue-500 to-lime-400 text-transparent">
        {{ $title }}
    </h2>
    <p class="mt-3 text-lg text-gray-800">{{ $text }}</p>
</div>
