<x-layouts.guest>
    <div class="mx-auto mt-8 w-full max-w-md px-4 sm:mt-12">
        <h2 class="mb-4 text-xl font-bold sm:text-2xl">Set New Password</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            />

            <div>
                <label class="block text-sm font-medium" for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ $request->email ?? old('email') }}"
                    required
                    autocomplete="email"
                    class="mt-1 w-full rounded border p-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium" for="password">New Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="mt-1 w-full rounded border p-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium" for="password_confirmation">
                    Confirm Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="mt-1 w-full rounded border p-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                />
            </div>

            <button
                type="submit"
                class="w-full rounded bg-blue-600 p-2 text-white hover:bg-blue-700 transition"
            >
                Reset Password
            </button>
        </form>
    </div>
</x-layouts.guest>
