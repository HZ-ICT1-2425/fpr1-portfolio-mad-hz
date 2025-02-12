@props(['course' => $course, 'quarter' => $quarter])

<div class="p-4 border border-gray-200 rounded-lg course-card" data-ec="{{ $course->ec }}">
    <div class="flex items-center mb-4">
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="peer sr-only course-toggle" data-course-id="{{ $course->id }}"
                data-url="{{ route('dashboard.courses.toggle', ['course' => $course['id']]) }}" @checked($course->is_selected) />
            <div
                class="w-[3.25rem] h-7 bg-gray-300 rounded-full relative transition-all duration-200 ease-in-out peer-checked:bg-green-500 before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:w-6 before:h-6 before:bg-white before:rounded-full before:shadow-md before:transition-transform before:duration-200 peer-checked:before:translate-x-[1.55rem]">
            </div>
        </label>
    </div>

    <div>
        <p class="font-semibold text-sm text-gray-800">{{ $course->name }}</p>
        <p class="mt-1 text-sm text-gray-600">
            Quarter: {{ $quarter }}<br>
            Credits: {{ $course->ec }} EC
        </p>

        <ul class="mt-2">
            @foreach ($course->exams as $exam)
                <li class="text-sm text-gray-700">
                    {{ $exam['name'] }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
