<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>
            {{ config("app.name", "Daily Task Tracker") }} — Dashboard
        </title>

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="bg-gray-100 text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col md:flex-row">
            {{-- Mobile Top Bar with Hamburger --}}
            <header
                class="flex items-center justify-between border-b bg-white px-4 py-3 md:hidden"
            >
                <h1 class="text-lg font-semibold">
                    {{ $title ?? "Dashboard" }}
                </h1>
                <div class="flex items-center space-x-2">
                    <form method="POST" action="{{ route("logout") }}">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                    <button
                        id="mobile-menu-button"
                        aria-label="Open menu"
                        class="text-gray-600 focus:outline-none"
                    >
                        <!-- simple hamburger icon -->
                        <svg
                            class="h-6 w-6"
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
                </div>
            </header>

            {{-- Sidebar --}}
            <aside
                id="sidebar"
                class="fixed inset-y-0 left-0 z-30 h-full w-64 shrink-0 -translate-x-full transform overflow-y-auto border-r bg-white transition-transform duration-200 ease-in-out md:static md:block md:h-auto md:translate-x-0"
            >
                <div class="p-6 text-lg font-bold">Daily Task Tracker</div>

                <nav class="space-y-2 px-4">
                    <a
                        href="{{ route("dashboard.index") }}"
                        class="block rounded px-3 py-2 hover:bg-gray-100"
                    >
                        Dashboard
                    </a>

                    {{--
                        <a href="{{ route('tasks.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                        Tasks
                        </a>
                        
                        <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                        Categories
                        </a>
                    --}}
                </nav>
            </aside>

            {{-- Overlay for mobile navigation --}}
            <div
                id="sidebar-overlay"
                class="bg-opacity-40 fixed inset-0 z-20 hidden bg-black md:hidden"
            ></div>

            {{-- Main Area --}}
            <div class="flex min-h-screen flex-1 flex-col md:ml-0">
                {{-- Top Bar for desktop --}}
                <header
                    class="hidden items-center justify-between border-b bg-white px-6 py-4 md:flex"
                >
                    <h1 class="text-xl font-semibold">
                        {{ $title ?? "Dashboard" }}
                    </h1>

                    <form method="POST" action="{{ route("logout") }}">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                </header>

                {{-- Page Content --}}
                <main class="flex-1 p-4 sm:p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script>
            // Toggle sidebar on mobile
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const menuBtn = document.getElementById('mobile-menu-button');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
            menuBtn?.addEventListener('click', openSidebar);
            overlay?.addEventListener('click', closeSidebar);

            // Close sidebar on transition to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    closeSidebar();
                }
            });
        </script>
    </body>
</html>
