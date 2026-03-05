@props(['task'])
<a {{ $attributes }} class="w-full">
    <div class="p-4 bg-gray-100 rounded shadow-md mb-4 border-l-4 border-blue-500 flex justify-between items-center">
        <div class="">
            <h3 class="font-bold text-lg">{{ $task->title }}</h3>
            <p class="text-gray-600 text-sm">Created: {{ $task->created_at->diffForHumans() }}</p>
        </div>
                        
                            
        <form class="delete-form" action="{{ route('task.delete', $task) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 btn-delete">
                <x-gmdi-delete class="h-7 w-7"/>
            </button>
        </form>
    </div>
</a>

    <script>
        $(document).ready(function() {
        
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var form = $(this).closest(".delete-form");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    </script>