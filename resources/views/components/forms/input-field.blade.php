@props(['type', 'name', 'label', 'required' => false, 'value' => null])

<div>
    <label for="{{ $name }}" class="block mb-2">{{ $label }}</label>
    <div class="relative">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
            {{ $required ? 'required' : '' }}
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-lime-500 focus:ring-lime-500 disabled:opacity-50 disabled:pointer-events-none @error("$name") border-red-500 @enderror"
            aria-describedby="{{ $name }}-error">

        @error("$name")
            <div class="mt-3 absolute inset-y-0 end-0 pointer-events-none pe-3">
                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                    aria-hidden="true">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg>
            </div>
        @enderror
    </div>

    <x-forms.error-message :field="$name" />
</div>
