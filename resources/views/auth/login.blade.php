<x-layouts.guest>
    <div class="mx-auto mt-8 w-full max-w-md px-4 sm:mt-12">
        <h2 class="mb-4 text-xl font-bold sm:text-2xl">Login</h2>

        @if (session("status"))
            <div class="mb-4 rounded bg-green-100 p-2 text-green-800">
                {{ session("status") }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium" for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    class="mt-1 w-full rounded border p-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium" for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="mt-1 w-full rounded border p-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col-reverse items-start justify-between gap-2 sm:flex-row sm:items-center">
                <label class="inline-flex items-center text-sm">
                    <input type="checkbox" name="remember" class="mr-2" />
                    Remember me
                </label>
                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-blue-600 hover:underline"
                >
                    Forgot your password?
                </a>
            </div>

            <button
                type="submit"
                class="w-full rounded bg-blue-600 p-2 text-white hover:bg-blue-700 transition"
            >
                Login
            </button>
        </form>
    </div>
</x-layouts.guest>
