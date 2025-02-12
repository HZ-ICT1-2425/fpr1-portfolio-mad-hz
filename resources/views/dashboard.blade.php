<x-layouts.app>
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <x-shared.header title="Dashboard" text="Let's dive more into the HBO ICT Program." />

            <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                {{-- List of the courses --}}
                @foreach ($courses as $quarter => $quarterCourses)
                    @foreach ($quarterCourses as $course)
                        <x-dashboard.course-card :course="$course" :quarter="$quarter" />
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
                <div class="relative pt-1">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <span class="text-xs font-semibold inline-block text-gray-600">
                                Earned Credits
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-gray-600">
                                {{ $totalEc }}/60 EC
                            </span>
                        </div>
                    </div>
                    <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                        <div id="progress-bar"
                            class="flex flex-col justify-center bg-gradient-to-r from-blue-400 to-purple-500 transition-all duration-500 ease-out"
                            role="progressbar" aria-valuenow="{{ $totalEc }}" aria-valuemin="0"
                            aria-valuemax="60" style="width: {{ min(($totalEc / 60) * 100, 100) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Ajax request to save completed courses --}}
    <script>
        document.querySelectorAll('.course-toggle').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const url = this.dataset.url;

                const isSelected = this.checked;
                const ecValue = parseInt(this.closest('.course-card').dataset.ec);

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            this.checked = !this.checked;
                        }

                        // Update progress bar
                        const progressBar = document.getElementById('progress-bar');
                        const currentWidth = parseFloat(progressBar.style.width) || 0;
                        const ecSpan = document.querySelector('[aria-valuenow]');

                        // Update displayed EC value
                        const newTotal = data.totalEc;
                        ecSpan.textContent = `${newTotal}/60 EC`;
                        ecSpan.setAttribute('aria-valuenow', newTotal);

                        // Animate progress bar
                        progressBar.style.width = `${Math.min((newTotal / 60) * 100, 100)}%`;
                    });
            });
        });
    </script>
</x-layouts.app>
