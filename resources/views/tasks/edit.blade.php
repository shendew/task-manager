<x-layout>
    <form action="{{ route('task.update', $task) }}" class="update-form auth-form shadow-md" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="text-3xl font-bold mt-10 mb-10">Update Task</h2>
        <label for="title">Task Title</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ $task->description }}</textarea>
        <button class="btn-update primary-button bg-green-500 w-full hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-10" type="submit">Update Task</button>
    </form>


    <script>
        $(document).ready(function() {
        
        $(document).on('click', '.btn-update', function(e) {
            e.preventDefault();
            var form = $(this).closest(".update-form");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    </script>
</x-layout>