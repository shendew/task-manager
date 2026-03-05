<x-layout>

    <h2 class="text-xl">Dashboard</h2>
    <div class="flex justify-between items-center pl-3 pr-3 mt-5 mb-3">
        <a href="{{ route('show.create') }}">
            <div class="flex flex-row bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <x-gmdi-add class="w-6 h-6" />Add Task
            </div>
        </a>
        <div class="popwrap">
            <button id="open-popup">Filter by
                Date</button>
            <div id="popup-content" class="popup">
                <div class="flex flex-row align-center justify-end">

                    <button id="close-popup" class=" font-bold rounded mt-2"><x-gmdi-close class="w-6 h-6" /></button>
                </div>
                <form action="{{ route('tasks.filter') }}" method="GET" class="p-4">
                    <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}"
                        class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 m-auto">

                    <div class="flex flex-row align-center justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Filter</button>

                    </div>
                </form>

            </div>
        </div>

    </div>
    <div class="flex flex-col h-[80vh] bg-white p-4 shadow-inner rounded-lg">

        <div class="flex-grow overflow-y-auto pr-2">
            @foreach ($tasks as $task)
            <x-task_item :task="$task" href="{{ route('task.show',$task) }}">

            </x-task_item>
            @endforeach
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200">
            {{ $tasks->links() }}
        </div>

    </div>
    <script>

        document.getElementById('open-popup').addEventListener('click', function () {
            var popup = document.getElementById('popup-content');
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'block';
            } else {
                popup.style.display = 'none';
            }
        });

        document.getElementById('close-popup').addEventListener('click', function () {
            document.getElementById('popup-content').style.display = 'none';
        });

    </script>
</x-layout>