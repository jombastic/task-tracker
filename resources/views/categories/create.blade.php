<x-layouts.dashboard-layout title="Create Category">

    <div class="max-w-xl w-full mx-auto px-4 sm:px-6 lg:px-0">

        <div class="mb-6">
            <h2 class="text-lg sm:text-xl font-semibold">New Category</h2>
            <p class="text-sm sm:text-base text-gray-500">
                Create a category to organize your tasks.
            </p>
        </div>

        <div class="bg-white rounded shadow p-4 sm:p-6">

            <form method="POST" action="{{ route('categories.store') }}">
                @include('categories._form')

                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-3">
                    <a href="{{ route('categories.index') }}"
                        class="px-4 py-2 text-sm text-gray-700 hover:underline w-full sm:w-auto text-center">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 w-full sm:w-auto">
                        Save Category
                    </button>
                </div>
            </form>

        </div>

    </div>

</x-layouts.dashboard-layout>
