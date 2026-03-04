<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <nav class="w-full bg-blue-400 p-4 shadow-md mb-4 sticky top-0 z-10">
        <header class="w-full flex flex-row justify-between align-center">
            <a href="/" class="text-xl font-bold text-white">
                Task Manager
            </a>
            <div class="right-panel">

                @auth
                    <span class="text-white mr-4">Welcome, {{ Auth::user()->name }}</span>
                    <a href="/logout" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</a>
                    {{-- <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                    </form> --}}
                @endauth
                @guest
                    <a href="{{route('show.login')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Login</a>
                @endguest
            </div>

        </header>
    </nav>
    <div class="w-2/3 h-[80vh] align-center m-auto">
        {{ $slot }}
    </div>
</body>
</html>