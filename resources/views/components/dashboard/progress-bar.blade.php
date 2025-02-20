@props(['totalEc' => $totalEc])

<div class="mt-4">
    <label for="progress-bar" class="block text-sm font-medium text-gray-700">Progress:</label>
    <div class="relative pt-1">
        <div class="flex items-center justify-between">
            <span class="text-xs font-medium text-gray-600">0</span>
            <span class="text-xs font-medium text-gray-600" id="totalEc">{{ $totalEc }}/60 EC</span>
            <span class="text-xs font-medium text-gray-600">60</span>
        </div>
        <div class="flex w-full h-3 bg-gray-200 rounded-full overflow-hidden">
            <div id="progress-bar"
                class="flex flex-col justify-center bg-gradient-to-r transition-all duration-500 ease-out {{ $totalEc < 45 ? 'bg-red-500' : 'bg-green-500' }}"
                role="progressbar" aria-valuenow="{{ $totalEc }}" aria-valuemin="0"
                aria-valuemax="60" style="width: {{ min(($totalEc / 60) * 100, 100) }}%"></div>
        </div>
    </div>
</div>
