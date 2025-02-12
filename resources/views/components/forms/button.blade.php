@props(['text', 'type'])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'w-full px-4 py-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-lime-500 text-white hover:bg-lime-600 focus:outline-none focus:bg-lime-600 disabled:opacity-50 disabled:pointer-events-none']) }}>
    {{ $text }}
</button>
