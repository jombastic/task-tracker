@csrf

<div class="mx-auto w-full max-w-full space-y-4 px-2 sm:max-w-xl sm:space-y-6 sm:px-6">

    {{-- Title --}}
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-5 sm:items-center sm:gap-6">
        <label for="title" class="block text-sm font-medium text-gray-700 sm:col-span-2 sm:mb-0 sm:text-right">
            Title
        </label>
        <div class="sm:col-span-3">
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $task->title ?? '') }}"
                required
                class="mt-1 w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Description --}}
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-5 sm:items-start sm:gap-6">
        <label for="description" class="block text-sm font-medium text-gray-700 sm:col-span-2 sm:mb-0 sm:text-right">
            Description
        </label>
        <div class="sm:col-span-3">
            <textarea
                name="description"
                id="description"
                rows="4"
                class="mt-1 w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 resize-y"
            >{{ old('description', $task->description ?? '') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Category --}}
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-5 sm:items-center sm:gap-6">
        <label for="category_id" class="block text-sm font-medium text-gray-700 sm:col-span-2 sm:mb-0 sm:text-right">
            Category
        </label>
        <div class="sm:col-span-3">
            <select
                name="category_id"
                id="category_id"
                class="mt-1 w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            >
                <option value="">— No category —</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $task->category_id ?? null) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Due date --}}
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-5 sm:items-center sm:gap-6">
        <label for="due_date" class="block text-sm font-medium text-gray-700 sm:col-span-2 sm:mb-0 sm:text-right">
            Due date
        </label>
        <div class="sm:col-span-3">
            <input
                type="date"
                name="due_date"
                id="due_date"
                value="{{ old('due_date', optional($task->due_date ?? null)?->format('Y-m-d')) }}"
                class="mt-1 w-full rounded border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
            @error('due_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

</div>
