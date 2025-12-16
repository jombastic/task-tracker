<x-layouts.guest-layout>
    <div class="mx-auto mt-8 w-full max-w-md px-4 sm:mt-12">
        <h2 class="mb-4 text-xl font-bold sm:text-2xl">Reset Password</h2>

        @if (session("status"))
            <div class="mb-4 rounded bg-green-100 p-2 text-green-800">
                {{ session("status") }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route("password.email") }}"
            class="space-y-4"
        >
            @csrf

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
                    class="mt-1 w-full rounded border p-2 transition focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none"
                />
                @error("email")
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full rounded bg-blue-600 p-2 text-white transition hover:bg-blue-700"
            >
                Send Password Reset Link
            </button>
        </form>
    </div>
</x-layouts.guest-layout>
