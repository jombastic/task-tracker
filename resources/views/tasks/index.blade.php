<x-layouts.dashboard-layout title="Tasks">
    <div
        class="mb-6 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center"
    >
        <div>
            <h2 class="text-lg font-semibold">Your Tasks</h2>
            <p class="text-sm text-gray-500">
                Manage your daily tasks and track progress.
            </p>
        </div>

        <a
            href="{{ route("tasks.create") }}"
            class="w-full rounded bg-blue-600 px-4 py-2 text-center text-sm text-white hover:bg-blue-700 sm:w-auto"
        >
            + New Task
        </a>
    </div>

    @if ($tasks->isEmpty())
        <div class="rounded bg-white p-6 text-center text-gray-500 shadow">
            No tasks yet. Create your first one.
        </div>
    @else
        <div class="overflow-x-auto rounded bg-white shadow">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-50 text-left text-sm text-gray-600">
                    <tr>
                        <th class="px-2 py-3 sm:px-4">Done</th>
                        <th class="px-2 py-3 sm:px-4">Title</th>
                        <th class="px-2 py-3 sm:px-4">Category</th>
                        <th class="px-2 py-3 sm:px-4">Due</th>
                        <th class="px-2 py-3 text-right sm:px-4">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($tasks as $task)
                        <tr
                            class="{{ $task->completed_at ? "bg-green-50" : "" }}"
                        >
                            {{-- Completion toggle --}}
                            <td class="px-2 py-3 sm:px-4">
                                <form
                                    method="POST"
                                    action="{{ route("tasks.toggle-complete", $task) }}"
                                >
                                    @csrf
                                    @method("PATCH")

                                    <input
                                        type="checkbox"
                                        onchange="this.form.submit()"
                                        {{ $task->completed_at ? "checked" : "" }}
                                    />
                                </form>
                            </td>

                            {{-- Title --}}
                            <td class="px-2 py-3 sm:px-4">
                                <span
                                    class="{{ $task->completed_at ? "text-gray-500 line-through" : "" }}"
                                >
                                    {{ $task->title }}
                                </span>

                                @if ($task->description)
                                    <p class="text-xs text-gray-500">
                                        {{ Str::limit($task->description, 80) }}
                                    </p>
                                @endif
                            </td>

                            {{-- Category --}}
                            <td class="px-2 py-3 text-sm text-gray-600 sm:px-4">
                                {{ $task->category?->name ?? "—" }}
                            </td>

                            {{-- Due date --}}
                            <td class="px-2 py-3 text-sm text-gray-600 sm:px-4">
                                @if ($task->due_date)
                                    {{ $task->due_date->format("M d, Y") }}
                                @else
                                        —
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-2 py-3 text-right text-sm sm:px-4">
                                <div
                                    class="flex flex-col items-end gap-1 sm:flex-row sm:justify-end sm:gap-3"
                                >
                                    <a
                                        href="{{ route("tasks.edit", $task) }}"
                                        class="text-blue-600 hover:underline"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route("tasks.destroy", $task) }}"
                                        onsubmit="
                                            return confirm('Delete this task?');
                                        "
                                    >
                                        @csrf
                                        @method("DELETE")

                                        <button
                                            class="text-red-600 hover:underline"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</x-layouts.dashboard-layout>
