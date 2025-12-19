<x-layouts.dashboard-layout title="Categories">
    <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between sm:gap-0"
    >
        <h2 class="text-lg font-semibold">Your Categories</h2>

        <a
            href="{{ route("categories.create") }}"
            class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            + New Category
        </a>
    </div>

    <div class="divide-y rounded bg-white shadow">
        @forelse ($categories as $category)
            <div
                class="flex flex-col gap-4 p-4 sm:flex-row sm:items-center sm:justify-between"
            >
                <div>
                    <p class="font-medium break-words">
                        {{ $category->name }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $category->tasks_count }} tasks
                    </p>
                </div>

                <div class="flex flex-row justify-start gap-3 sm:justify-end">
                    @can("update", $category)
                        <a
                            href="{{ route("categories.edit", $category) }}"
                            class="text-sm text-blue-600 hover:underline"
                        >
                            Edit
                        </a>
                    @endcan

                    @can("delete", $category)
                        <form
                            method="POST"
                            action="{{ route("categories.destroy", $category) }}"
                            onsubmit="return confirm('Delete this category?');"
                            class="flex"
                        >
                            @csrf
                            @method("DELETE")

                            <button
                                type="submit"
                                class="text-sm text-red-600 hover:underline"
                            >
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        @empty
            <div class="p-6 text-center text-gray-500">
                You haven’t created any categories yet.
            </div>
        @endforelse
    </div>
</x-layouts.dashboard-layout>
