@props(['link', 'name'])

<a class="inline-flex items-center gap-x-1 text-sm text-lime-500" href="{{ $link }}">
    {{ $name }}
    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6" />
    </svg>
</a>
