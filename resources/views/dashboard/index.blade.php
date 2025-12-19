<x-layouts.dashboard-layout title="Dashboard">
    {{-- Stats --}}
    <div
        class="mb-6 grid grid-cols-1 gap-4 sm:mb-8 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3"
    >
        <div
            class="flex flex-col items-start rounded bg-white p-4 shadow sm:p-6"
        >
            <p class="text-xs text-gray-500 sm:text-sm">Total Tasks</p>
            {{-- <p class="text-xl sm:text-2xl font-bold">{{ $stats['total'] }}</p> --}}
        </div>

        <div
            class="flex flex-col items-start rounded bg-white p-4 shadow sm:p-6"
        >
            <p class="text-xs text-gray-500 sm:text-sm">Completed</p>
            {{--
                <p class="text-xl sm:text-2xl font-bold text-green-600">
                {{ $stats['completed'] }}
                </p>
            --}}
        </div>

        <div
            class="flex flex-col items-start rounded bg-white p-4 shadow sm:p-6"
        >
            <p class="text-xs text-gray-500 sm:text-sm">Pending</p>
            {{--
                <p class="text-xl sm:text-2xl font-bold text-yellow-600">
                {{ $stats['pending'] }}
                </p>
            --}}
        </div>
    </div>

    {{-- Today’s Tasks --}}
    <div class="rounded bg-white shadow">
        <div class="border-b p-3 text-base font-semibold sm:p-4 sm:text-lg">
            Today’s Tasks
        </div>

        <ul class="divide-y">
            {{--
                @forelse ($todayTasks as $task)
                <li class="p-3 sm:p-4 flex flex-col sm:flex-row gap-2 sm:gap-0 sm:justify-between sm:items-center">
                <div class="flex flex-col">
                <p class="font-medium text-sm sm:text-base">{{ $task->title }}</p>
                <p class="text-xs sm:text-sm text-gray-500">
                {{ optional($task->category)->name }}
                </p>
                </div>
                
                <span
                class="text-xs sm:text-sm px-2 py-1 rounded w-max
                {{ $task->is_completed ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                {{ $task->is_completed ? 'Completed' : 'Pending' }}
                </span>
                </li>
                @empty
                <li class="p-3 sm:p-4 text-gray-500 text-sm sm:text-base">
                No tasks for today.
                </li>
                @endforelse
            --}}
        </ul>
    </div>
</x-layouts.dashboard-layout>
