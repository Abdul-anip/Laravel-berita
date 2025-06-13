{{-- resources/views/components/admin-layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <div class="min-h-screen">
        {{-- Navbar --}}
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center space-x-6">
                        <span class="text-xl font-bold text-gray-800 dark:text-gray-100">🛠️ Admin Panel</span>

                        <a href="{{ route('admin.berita.index') }}"
                           class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                            Kelola Berita
                        </a>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="text-sm font-semibold text-red-500 hover:text-red-600 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Content --}}
        <main class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if (session('success'))
                    <div class="mb-4 px-4 py-3 rounded-md border border-green-500 bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 px-4 py-3 rounded-md border border-red-500 bg-red-100 dark:bg-red-800 text-red-700 dark:text-red-200">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 px-4 py-3 rounded-md border border-red-500 bg-red-100 dark:bg-red-800 text-red-700 dark:text-red-200">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Dynamic Slot Content --}}
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
