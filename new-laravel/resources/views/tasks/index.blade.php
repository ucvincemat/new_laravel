<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen text-slate-100 bg-[radial-gradient(circle_at_20%_0%,_rgba(168,85,247,0.25),_transparent_35%),radial-gradient(circle_at_80%_40%,_rgba(34,211,238,0.16),_transparent_38%),linear-gradient(130deg,_#0b1121_0%,_#0f1733_45%,_#120f25_100%)] dark:bg-[radial-gradient(circle_at_10%_10%,_rgba(139,92,246,0.35),_transparent_30%),radial-gradient(circle_at_90%_30%,_rgba(34,211,238,0.30),_transparent_40%),linear-gradient(145deg,_#040616_0%,_#0d0f25_45%,_#0f0720_100%)]">
    <div class="max-w-5xl mx-auto p-6">
        <section class="rounded-3xl border border-fuchsia-300/20 bg-slate-900/30 dark:bg-slate-900/60 p-6 shadow-[0_25px_60px_rgba(63,63,255,0.25)] backdrop-blur-xl">
            <header class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h1 class="text-4xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-fuchsia-400 to-amber-300">Tasks Hub</h1>
                <a href="/tasks/create" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-fuchsia-600 to-cyan-600 text-white font-semibold shadow-lg ring-1 ring-cyan-300/40 hover:scale-[1.02] transform transition-all duration-200 focus-visible:ring-4 focus-visible:ring-fuchsia-300/60">
                    + Create New Task
                </a>
            </header>

            <div class="grid gap-4">
                @forelse($tasks as $task)
                    <article class="rounded-2xl border border-cyan-300/20 bg-slate-800/80 p-5 shadow-lg shadow-cyan-700/15 transition hover:-translate-y-1 hover:shadow-cyan-700/40">
                        <div class="mb-4 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                            <div>
                                <h2 class="text-2xl font-bold text-cyan-100">{{ $task->title }}</h2>
                                <p class="mt-1 text-sm text-cyan-200">{{ $task->description ?: 'No description available.' }}</p>
                                <div class="mt-1 flex items-center gap-2">
                                    <span class="text-xs text-cyan-300">Priority:</span>
                                    <input type="range" value="{{ match($task->priority) { 'Low' => 1, 'Normal' => 2, 'High' => 3, 'Urgent' => 4, default => 2 } }}" disabled class="w-16 h-1 bg-slate-600 rounded appearance-none cursor-not-allowed opacity-60" />
                                    <span class="text-xs text-cyan-200">{{ $task->priority ?? 'Normal' }}</span>
                                </div>
                            </div>
                            <span class="px-3 py-1.5 text-sm font-semibold rounded-full {{ $task->is_completed ? 'bg-emerald-500/20 text-emerald-300' : 'bg-amber-500/20 text-amber-200' }}">
                                {{ $task->is_completed ? 'Completed' : 'Pending' }}
                            </span>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <a href="/tasks/{{ $task->id }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-700/80 text-cyan-100 hover:bg-slate-600 focus-visible:ring-2 focus-visible:ring-cyan-400">View</a>
                            <a href="/tasks/{{ $task->id }}/edit" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-yellow-500/15 text-amber-200 hover:bg-yellow-500/30 focus-visible:ring-2 focus-visible:ring-amber-300">Edit</a>
                            <form action="/tasks/{{ $task->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-500/80 text-white hover:bg-red-600 focus-visible:ring-2 focus-visible:ring-rose-400">Delete</button>
                            </form>
                        </div>
                    </article>
                @empty
                    <p class="rounded-lg bg-slate-800/80 border border-slate-600 p-4 text-cyan-200">No tasks yet. Hit “Create New Task” to start building your list.</p>
                @endforelse
            </div>
        </section>
    </div>
</body>
</html>