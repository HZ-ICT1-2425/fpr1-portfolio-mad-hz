<x-layouts.app>
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <x-shared.header title="Dashboard" text="Let's dive more into the HBO ICT Program." />

            <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                {{-- List of the courses --}}
                @foreach ($quarters as $quarter)
                    @foreach ($quarter['courses'] as $course)
                        <x-dashboard.course-card :course="$course" :quarter="$quarter['number']" />
                    @endforeach
                @endforeach
            </div>

            {{-- NBSA Boundry Alert --}}
            <div class="bg-blue-100 border border-blue-200 text-gray-800 rounded-lg p-4 mt-5 flex items-center"
                role="alert" tabindex="-1" aria-labelledby="hs-actions-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
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
                    <img src="{{ asset('assets/images/general/alert.png') }}" alt="Alert"
                        class="w-10 h-10 rounded-lg">
                    <img src="{{ asset('assets/images/general/hz-logo.png') }}" alt="HZ Logo"
                        class="w-10 h-10 rounded-lg">
                </div>
            </div>

            {{-- Progress bar --}}
            <div class="mt-4">
                <label for="progress-bar" class="block text-sm font-medium text-gray-700">Progress:</label>
                <div class="relative pt-1">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-medium text-gray-600">0</span>
                        <span class="text-xs font-medium text-gray-600">x / total credits</span>
                        <span class="text-xs font-medium text-gray-600">60</span>
                    </div>
                    {{-- Add class and width --}}
                    <div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden mt-2">
                        <div
                            class="flex flex-col justify-center rounded-full transition duration-500 text-xs text-white text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
