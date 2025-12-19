@csrf

<div class="mx-auto max-w-full space-y-4 px-2 sm:max-w-xl sm:space-y-6 sm:px-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6">
        <label
            for="name"
            class="mb-1 block text-sm font-medium text-gray-700 sm:mb-0 sm:min-w-[150px] sm:text-right"
        >
            Category name
        </label>

        <div class="flex-1">
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old("name", $category->name ?? "") }}"
                required
                class="mt-1 block w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-blue-500 focus:ring-blue-500 sm:mt-0"
            />

            @error("name")
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6">
        <label
            for="color"
            class="mb-1 block text-sm font-medium text-gray-700 sm:mb-0 sm:min-w-[150px] sm:text-right"
        >
            Color (optional)
        </label>

        <div class="flex-1">
            <input
                type="text"
                name="color"
                id="color"
                value="{{ old("color", $category->color ?? "") }}"
                placeholder="e.g. blue, green, red"
                class="mt-1 block w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-blue-500 focus:ring-blue-500 sm:mt-0"
            />

            @error("color")
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
