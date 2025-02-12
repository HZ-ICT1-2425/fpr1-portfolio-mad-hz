<div class="bg-blue-100 border border-blue-200 text-gray-800 rounded-lg p-4 mt-5 flex items-center" role="alert"
    tabindex="-1" aria-labelledby="hs-actions-label">
    <div class="flex">
        <div class="shrink-0">
            <svg class="shrink-0 size-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 16v-4"></path>
                <path d="M12 8h.01"></path>
            </svg>
        </div>
        <div class="ms-3">
            <h3 id="hs-actions-label" class="font-semibold">
                NBSA Boundary
            </h3>
            <div class="mt-2 text-sm text-gray-600">
                To be able to continue to the next year, you need at least 45 ECs.
            </div>
        </div>
    </div>

    {{-- HZ & Alert images --}}
    <div class="ml-auto flex gap-3">
        <img src="{{ asset('assets/images/general/alert.png') }}" alt="Alert" class="w-10 h-10 rounded-lg">
        <img src="{{ asset('assets/images/general/hz-logo.png') }}" alt="HZ Logo" class="w-10 h-10 rounded-lg">
    </div>
</div>
