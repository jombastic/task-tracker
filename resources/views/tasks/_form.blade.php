@csrf

<div class="space-y-6">
    {{-- Title --}}
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">
            Title
        </label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}" required
            class="mt-1 w-full rounded border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">
            Description
        </label>
        <textarea name="description" id="description" rows="3"
            class="mt-1 w-full rounded border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $task->description ?? '') }}</textarea>
    </div>

    {{-- Due Date --}}
    <div>
        <label for="due_date" class="block text-sm font-medium text-gray-700">
            Due date
        </label>
        <input type="date" name="due_date" id="due_date"
            value="{{ old('due_date', optional($task->due_date ?? null)->format('Y-m-d')) }}"
            class="mt-1 w-full rounded border-gray-300 bg-gray-50 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
    </div>

    {{-- Category --}}
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">
            Category
        </label>
        <select name="category_id" id="category_id"
            class="mt-1 w-full rounded border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
            <option value="">No category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $task->category_id ?? null) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Recurrence --}}
    <div class="rounded border bg-gray-50 p-4">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_recurring" value="1" @checked(old('is_recurring', $task->is_recurring ?? false))
                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
            <span class="text-sm font-medium text-gray-700">
                Make this a recurring task
            </span>
        </label>

        <div class="mt-4">
            <label for="recurrence_type" class="block text-sm font-medium text-gray-700">
                Recurrence frequency
            </label>
            <select name="recurrence_type" id="recurrence_type"
                class="mt-1 w-full rounded border-gray-300 bg-white px-4 py-2 shadow-sm">
                <option value="">Select frequency</option>
                <option value="daily" @selected(old('recurrence_type', $task->recurrence_type ?? '') === 'daily')>
                    Daily
                </option>
                <option value="weekly" @selected(old('recurrence_type', $task->recurrence_type ?? '') === 'weekly')>
                    Weekly
                </option>
            </select>

            @error('recurrence_type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
