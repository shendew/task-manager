<x-layout>
    <form class="auth-form shadow-md" action="{{ route('login') }}" method="POST">
        @csrf
        <h2 class="text-3xl font-bold mt-10 mb-10">Login to Your Account</h2>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button class="primary-button bg-green-500 w-full hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-10" type="submit"> Login</button>
        <a href="/register" class="block text-center mt-4 text-sm text-gray-600 hover:text-gray-900">Don't have an account? Register</a>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-500 text-sm mt-2">{{ $error }}</p>
            @endforeach
        @endif
        
    </form>
</x-layout>