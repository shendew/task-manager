<x-layout>
    <h2>{{ $task->title }}</h2>
    <p>{{ $task->description }}</p>
    <form action="{{ route('task.complete', $task) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Mark as Completed</button>
    </form>
    
    <form action="{{ route('task.delete', $task) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
</x-layout>