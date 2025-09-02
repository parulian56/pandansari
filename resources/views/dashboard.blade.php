<x-app-layout>
    <!-- Tombol Hamburger -->
    <button id="menu-btn"
        class="fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
        <div class="w-6 h-6 flex flex-col justify-center space-y-1">
            <span class="hamburger-line block w-full h-0.5 bg-gray-800 rounded"></span>
            <span class="hamburger-line block w-full h-0.5 bg-gray-800 rounded"></span>
            <span class="hamburger-line block w-full h-0.5 bg-gray-800 rounded"></span>
        </div>
    </button>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center ml-12">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-40 overflow-y-auto">
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800">Menu</h3>
                    <p class="text-sm text-gray-600 mt-1">Navigation</p>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">
                        <span class="w-5 h-5 mr-3">🏠</span>
                        Dashboard
                    </a>

                    <a href="{{ url('/candidates/create') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">
                        <span class="w-5 h-5 mr-3">➕</span>
                        Add Candidate
                    </a>

                    <a href="{{ url('/polls/results') }}"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition">
                        <span class="w-5 h-5 mr-3">📊</span>
                        Polls Result
                    </a>
                </nav>

                <hr class="my-6 border-gray-200">

                <nav class="space-y-2">
                    <a href="#settings"
                        class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        ⚙️ Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-3 text-red-700 rounded-lg hover:bg-red-50 transition">
                            🚪 Logout
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Overlay -->
        <div id="overlay"
            class="fixed inset-0 bg-black bg-opacity-50 opacity-0 invisible transition-all duration-300 z-30"></div>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300" id="main-content">
            <div class="p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Welcome Card -->
                    <div class="bg-white shadow-sm rounded-lg mb-6">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Welcome Back!</h3>
                            <p class="text-gray-600">You're successfully logged in to the dashboard.</p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <p class="text-sm text-gray-600">Total Candidates</p>
                            <p class="text-2xl font-bold text-gray-900">12</p>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <p class="text-sm text-gray-600">Total Votes</p>
                            <p class="text-2xl font-bold text-gray-900">1,247</p>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <p class="text-sm text-gray-600">Active Polls</p>
                            <p class="text-2xl font-bold text-gray-900">3</p>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h4>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <p class="text-sm text-gray-700">New candidate "John Doe" added</p>
                                <span class="ml-auto text-xs text-gray-500">2 hours ago</span>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <p class="text-sm text-gray-700">Poll "Presidential Election 2024" completed</p>
                                <span class="ml-auto text-xs text-gray-500">1 day ago</span>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                                <p class="text-sm text-gray-700">System maintenance scheduled</p>
                                <span class="ml-auto text-xs text-gray-500">2 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Styles for hamburger animation -->
    <style>
        .hamburger-line {
            transition: all 0.3s ease;
        }
        .hamburger-active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }
        .hamburger-active .hamburger-line:nth-child(2) {
            opacity: 0;
        }
        .hamburger-active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }
    </style>

    <!-- Script -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleSidebar() {
            const isOpen = !sidebar.classList.contains('-translate-x-full');

            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0', 'invisible');
                overlay.classList.remove('opacity-100', 'visible');
                menuBtn.classList.remove('hamburger-active');
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('opacity-0', 'invisible');
                overlay.classList.add('opacity-100', 'visible');
                menuBtn.classList.add('hamburger-active');
            }
        }

        menuBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
        });
    </script>
</x-app-layout>
