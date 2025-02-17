<x-layouts.app>
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <x-shared.header title="Dashboard" text="Let's dive more into the HBO ICT Program." />

            <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                {{-- If there are no courses --}}
                @if ($courses->count() <= 0)
                    <div class="text-center font-medium text-xl mt-2">There are no courses/exams yet.</div>
                @else
                    {{-- List of the courses --}}
                    @foreach ($courses as $quarter => $quarterCourses)
                        @foreach ($quarterCourses as $course)
                            <x-dashboard.course-card :course="$course" :quarter="$quarter" />
                        @endforeach
                    @endforeach
                @endif

            </div>

            {{-- NBSA Boundry Alert --}}
            <x-dashboard.nbsa-boundry-alert />

            {{-- Progress bar --}}
            <x-dashboard.progress-bar :totalEc="$totalEc" />
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
                        const totalEc = document.getElementById('totalEc');

                        // Update displayed EC value
                        const newTotal = data.totalEc;
                        ecSpan.setAttribute('aria-valuenow', newTotal);
                        totalEc.textContent = `${newTotal}/60 EC`

                        // Animate progress bar
                        progressBar.style.width = `${Math.min((newTotal / 60) * 100, 100)}%`;

                        if (newTotal < 45) {
                            progressBar.classList.remove('bg-green-500');
                            progressBar.classList.add('bg-red-500');
                        } else {
                            progressBar.classList.remove('bg-red-500');
                            progressBar.classList.add('bg-green-500');
                        }
                    });
            });
        });
    </script>
</x-layouts.app>
