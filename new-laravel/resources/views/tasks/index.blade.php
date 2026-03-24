<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>
    <h1>Tasks</h1>
    <a href="/tasks/create">Create New Task</a>
    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
                <p>Completed: {{ $task->is_completed ? 'Yes' : 'No' }}</p>
                <a href="/tasks/{{ $task->id }}">View</a>
                <a href="/tasks/{{ $task->id }}/edit">Edit</a>
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