<x-layout>
    <div class="flex flex-col p-5  rounded shadow-md h-2/3">

        <div class="flex flex-row justify-between w-full">
            <div class="flex flex-row mb-4 items-center">
                <a href="{{ url()->previous() }}">
                    <x-gmdi-arrow-back class="h-5 w-5 mr-5 cursor"/>
                </a>
                <h2 class="text-xl font-bold">{{ $task->title }}</h2>
            </div>
            <div class="flex flex-row space-x-2">

                <a href="{{ route('task.showEdit', $task) }}"><x-gmdi-edit class="h-5 w-5"/></a>

                <form class="delete-form" action="{{ route('task.delete', $task) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="self-end btn-delete" type="button"><x-gmdi-delete-outline class="h-5 w-5"/></button>
                </form>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto">
            <p class="text-gray-600">{{ $task->description }}</p>
        </div>
        <div class="mt-4 flex flex-row justify-between items-center">
            <p class="text-gray-600 text-sm">{{ $task->created_at->diffForHumans() }}</p>
            @if ($task->status)
                <span class="bg-green-500 text-white py-1 px-3 rounded-full text-sm font-bold">Completed</span>
                <form action="{{ route('task.uncomplete', $task) }}" method="POST">
                @csrf
                <button class="bg-red-500 p-2 font-bold text-white hover:bg-red-700 rounded" type="submit">
                    Mark as Un Completed
                </button>
            @else
                <span class="bg-yellow-500 text-white py-1 px-3 rounded-full text-sm font-bold">Pending</span>
                <form action="{{ route('task.complete', $task) }}" method="POST">
                @csrf
                <button class="bg-green-500 p-2 font-bold text-white hover:bg-green-700 rounded" type="submit">
                    Mark as Completed
                </button>
            </form>
            @endif
            
        </div>
        
    </div>

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
    
</x-layout>