<x-layout>
    <form class="auth-form shadow-md" action="{{ route('register') }}" method="POST">
        @csrf
        <h2 class="text-3xl font-bold mt-5 mb-10">Create Your Account</h2>
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value='{{ old('name') }}' required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value='{{ old('email') }}' required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Re-Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button class="primary-button bg-green-500 w-full hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-5" type="submit"> Register</button>
        <a href="/login" class="block text-center mt-4 text-sm text-gray-600 hover:text-gray-900">Already have an account? Login</a>


        @if($errors->any())
            <ul class="px-4 py-2 bg-red-100 mt-4">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 text-sm mt-2">{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        
    </form>
</x-layout>