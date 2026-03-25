<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>
    <h1>Tasks</h1>
    <form action="/tasks/create" method="GET" style="display:inline;">
        <button type="submit">Create New Task</button>
    </form>
    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
                <p>Completed: {{ $task->is_completed ? 'Yes' : 'No' }}</p>
                <form action="/tasks/{{ $task->id }}" method="GET" style="display:inline;">
                    <button type="submit">View</button>
                </form>
                <form action="/tasks/{{ $task->id }}/edit" method="GET" style="display:inline;">
                    <button type="submit">Edit</button>
                </form>
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>