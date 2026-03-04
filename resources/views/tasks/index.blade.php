<x-layout>

    <h2>Dashboard</h2>
    <a href="{{ route('show.create') }}">Add Task</a>
    <form action="{{ route('tasks.filter') }}" method="GET">
        <input type="date" name="date" id="date">
        <button type="submit">Filter</button>
    </form>
<div class="flex flex-col h-[80vh] bg-white p-4 shadow-inner rounded-lg">
        
        <div class="flex-grow overflow-y-auto pr-2">
            @foreach ($tasks as $task)
                <x-task_item :task="$task" href="{{ route('task.show',$task) }}">
                    <div class="p-4 bg-gray-100 rounded shadow-md mb-4 border-l-4 border-blue-500">
                        <div class="">
                            <h3 class="font-bold text-lg">{{ $task->title }}</h3>
                            <p class="text-gray-600 text-sm">Created: {{ $task->created_at->diffForHumans() }}</p>
                        </div>
                        <x-gmdi-delete />
                    </div>
                </x-task_item>
            @endforeach
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200">
            {{ $tasks->links() }}
        </div>
        
    </div>
</x-layout>