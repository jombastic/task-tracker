<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config("app.name", "Daily Task Tracker") }}</title>

        {{-- CSRF --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        {{-- Tailwind / Vite --}}
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="bg-gray-100 text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col">
            {{-- Navigation --}}
            <nav class="border-b bg-white">
                <div
                    class="mx-auto flex max-w-7xl flex-wrap items-center justify-between px-4 py-3 sm:px-6 lg:px-8"
                >
                    <a
                        href="{{ url("/") }}"
                        class="min-w-0 flex-1 truncate text-lg font-semibold"
                    >
                        Daily Task Tracker
                    </a>

                    <button
                        id="nav-toggle"
                        class="ml-2 rounded p-2 focus:ring-2 focus:ring-blue-200 focus:outline-none sm:hidden"
                    >
                        <svg
                            class="h-6 w-6 text-gray-700"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>

                    <div
                        id="nav-menu"
                        class="mt-2 flex hidden w-full flex-col gap-2 sm:mt-0 sm:flex sm:w-auto sm:flex-row sm:items-center sm:gap-4"
                    >
                        @auth
                            <a
                                href="{{ route("dashboard") }}"
                                class="text-sm text-gray-700"
                            >
                                Dashboard
                            </a>

                            <form method="POST" action="{{ route("logout") }}">
                                @csrf
                                <button
                                    class="w-full text-left text-sm text-red-600 hover:underline sm:w-auto"
                                >
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route("login") }}" class="text-sm">
                                Login
                            </a>
                            <a href="{{ route("register") }}" class="text-sm">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>

            {{-- Page Content --}}
            <main class="flex-1 px-2 py-4 sm:px-0">
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <footer
                class="border-t bg-white py-4 text-center text-xs text-gray-500 sm:text-sm"
            >
                © {{ now()->year }} Daily Task Tracker
            </footer>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const navToggle = document.getElementById('nav-toggle');
                const navMenu = document.getElementById('nav-menu');

                navToggle &&
                    navToggle.addEventListener('click', function () {
                        navMenu.classList.toggle('hidden');
                    });
            });
        </script>
    </body>
</html>
