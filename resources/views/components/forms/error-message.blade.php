@props(['field'])

@error($field)
    <p class="text-xs text-red-600 mt-2" id="{{ $field }}-error">{{ $message }}</p>
@enderror
