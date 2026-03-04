<x-layout>
    <form action="{{ route('store') }}" class="auth-form shadow-md" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 class="text-3xl font-bold mt-10 mb-10">Create a New Task</h2>
        <label for="title">Task Title</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
        <button class="primary-button bg-green-500 w-full hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-10" type="submit">Create Task</button>
    </form>
</x-layout>