<x-layouts.dashboard-layout title="Edit Category">
    <div class="mx-auto w-full max-w-xl px-4 sm:px-6 lg:px-0">
        <div class="mb-6">
            <h2 class="text-lg font-semibold sm:text-xl">Edit Category</h2>
            <p class="text-sm text-gray-500 sm:text-base">
                Update the details of your category.
            </p>
        </div>

        <div class="rounded bg-white p-4 shadow sm:p-6">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @method('PUT')

                @include('categories._form')

                <div class="mt-6 flex flex-col justify-end gap-3 sm:flex-row">
                    <a
                        href="{{ route('categories.index') }}"
                        class="w-full px-4 py-2 text-center text-sm text-gray-700 hover:underline sm:w-auto"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="w-full rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700 sm:w-auto"
                    >
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard-layout>
