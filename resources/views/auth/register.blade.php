<x-layouts.guest-layout>
    <div class="mx-auto mt-8 w-full max-w-md px-4 sm:mt-12">
        <h2 class="mb-4 text-xl font-bold sm:text-2xl">Register</h2>

        <form method="POST" action="{{ route("register") }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium" for="name">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old("name") }}"
                    required
                    autocomplete="name"
                    class="mt-1 w-full rounded border p-2 transition focus:border-green-400 focus:ring-2 focus:ring-green-200 focus:outline-none"
                />
                @error("name")
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium" for="email">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old("email") }}"
                    required
                    autocomplete="email"
                    class="mt-1 w-full rounded border p-2 transition focus:border-green-400 focus:ring-2 focus:ring-green-200 focus:outline-none"
                />
                @error("email")
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium" for="password">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="mt-1 w-full rounded border p-2 transition focus:border-green-400 focus:ring-2 focus:ring-green-200 focus:outline-none"
                />
                @error("password")
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label
                    class="block text-sm font-medium"
                    for="password_confirmation"
                >
                    Confirm Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="mt-1 w-full rounded border p-2 transition focus:border-green-400 focus:ring-2 focus:ring-green-200 focus:outline-none"
                />
            </div>

            <button
                type="submit"
                class="w-full rounded bg-green-600 p-2 text-white transition hover:bg-green-700"
            >
                Register
            </button>
        </form>
    </div>
</x-layouts.guest-layout>
