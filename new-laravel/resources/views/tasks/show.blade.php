<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen text-slate-100 bg-[radial-gradient(circle_at_60%_0%,_rgba(239,68,68,0.22),_transparent_34%),radial-gradient(circle_at_18%_80%,_rgba(59,130,246,0.26),_transparent_35%),linear-gradient(140deg,_#101627_0%,_#0b1328_40%,_#05040f_100%)] dark:bg-[radial-gradient(circle_at_25%_0%,_rgba(168,85,247,0.40),_transparent_28%),radial-gradient(circle_at_90%_40%,_rgba(34,211,238,0.36),_transparent_36%),linear-gradient(145deg,_#020415_0%,_#060810_55%,_#020209_100%)]">
    <div class="max-w-3xl mx-auto p-6">
        <section class="rounded-3xl border border-fuchsia-400/30 bg-slate-900/85 p-6 shadow-[0_24px_56px_rgba(79,70,229,0.35)] backdrop-blur-xl">
            <div class="mb-4 flex items-start justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-black text-cyan-100">{{ $task->title }}</h1>
                </div>
                <span class="mt-1 inline-flex items-center rounded-full px-3 py-1.5 text-sm font-semibold text-white {{ $task->is_completed ? 'bg-emerald-500/90' : 'bg-amber-500/85' }}">
                    {{ $task->is_completed ? 'Completed' : 'Pending' }}
                </span>
            </div>

            <div class="rounded-2xl border border-cyan-400/30 bg-slate-950/60 p-4">
                <h2 class="text-xl font-semibold text-cyan-100 mb-2">Description</h2>
                <p class="text-cyan-200 leading-relaxed">{{ $task->description ?: 'No description provided. Add more detailed task information here.' }}</p>
            </div>

            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                <div class="rounded-xl border border-cyan-400/20 bg-slate-900/70 p-3">
                    <h3 class="text-sm font-semibold text-cyan-200 uppercase">Status</h3>
                    <p class="mt-1 text-lg font-bold {{ $task->is_completed ? 'text-emerald-300' : 'text-amber-300' }}">{{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
                </div>
                <div class="rounded-xl border border-fuchsia-400/20 bg-slate-900/70 p-3">
                    <h3 class="text-sm font-semibold text-cyan-200 uppercase">Priority</h3>
                    <div class="mt-2">
                        <input type="range" value="{{ match($task->priority) { 'Low' => 1, 'Normal' => 2, 'High' => 3, 'Urgent' => 4, default => 2 } }}" disabled class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-not-allowed opacity-75" />
                        <div class="flex justify-between text-xs text-cyan-300 mt-1">
                            <span>Low</span>
                            <span>Normal</span>
                            <span>High</span>
                            <span>Urgent</span>
                        </div>
                        <p class="mt-1 text-lg font-bold text-cyan-100">{{ $task->priority ?? 'Normal' }}</p>
                    </div>
                </div>
            </div>

            <p class="mt-5 text-xs text-cyan-200/70">Created: {{ $task->created_at }} · Updated: {{ $task->updated_at }}</p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="/tasks/{{ $task->id }}/edit" class="inline-flex items-center gap-1 rounded-xl bg-gradient-to-r from-amber-400 to-fuchsia-500 px-5 py-2.5 text-sm font-semibold text-slate-950 shadow-md hover:scale-[1.02] transition transform focus-visible:ring-4 focus-visible:ring-fuchsia-400">Edit</a>
                <a href="/tasks" class="inline-flex items-center gap-1 rounded-xl border border-cyan-400/50 px-5 py-2.5 text-sm font-semibold text-cyan-100 hover:bg-cyan-500/20 focus-visible:ring-4 focus-visible:ring-cyan-300">Back to Tasks</a>
            </div>
        </section>
    </div>
</body>
</html>