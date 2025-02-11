@props(['link', 'title'])

<a href="{{ $link }}"
    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-lime-600 hover:text-lime-600 focus:outline-none focus:border-lime-600 focus:text-lime-600 disabled:opacity-50 disabled:pointer-events-none">
    {{ $title }}
</a>
