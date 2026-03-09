<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <p>Description: {{ $task->description }}</p>
    <p>Completed: {{ $task->is_completed ? 'Yes' : 'No' }}</p>
    <p>Created: {{ $task->created_at }}</p>
    <p>Updated: {{ $task->updated_at }}</p>
    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>