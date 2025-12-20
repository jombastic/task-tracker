<x-layouts.dashboard-layout title="Create Task">
    <div class="mx-auto w-full max-w-full px-2 sm:max-w-xl sm:px-6 lg:px-0">
        <div class="mb-4 sm:mb-6">
            <h2 class="text-base font-semibold sm:text-lg md:text-xl">New Task</h2>
            <p class="text-xs text-gray-500 sm:text-sm md:text-base">
                Create a task and assign it to a category.
            </p>
        </div>

        <div class="rounded bg-white p-2 shadow sm:p-4 md:p-6">
            <form method="POST" action="{{ route('tasks.store') }}">
                @include('tasks._form')

                <div class="mt-4 flex flex-col justify-end gap-2 sm:mt-6 sm:flex-row sm:gap-3">
                    <a
                        href="{{ route('tasks.index') }}"
                        class="w-full rounded px-4 py-2 text-center text-xs text-gray-700 hover:underline transition sm:w-auto sm:text-sm"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="w-full rounded bg-blue-600 px-4 py-2 text-xs text-white transition hover:bg-blue-700 sm:w-auto sm:text-sm"
                    >
                        Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard-layout>
