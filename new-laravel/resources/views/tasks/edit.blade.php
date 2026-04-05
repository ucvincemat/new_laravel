<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slider::-webkit-slider-thumb {
            appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #06b6d4, #a855f7);
            cursor: pointer;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
        }
        .slider::-moz-range-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #06b6d4, #a855f7);
            cursor: pointer;
            border: none;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
        }
    </style>
</head>
<body class="min-h-screen text-slate-100 bg-[radial-gradient(circle_at_15%_0%,_rgba(139,92,246,0.32),_transparent_30%),radial-gradient(circle_at_88%_40%,_rgba(56,189,248,0.25),_transparent_38%),linear-gradient(135deg,_#121a2f_0%,_#0d1136_45%,_#0b0d1f_100%)] dark:bg-[radial-gradient(circle_at_5%_20%,_rgba(34,211,238,0.40),_transparent_28%),radial-gradient(circle_at_75%_85%,_rgba(236,72,153,0.35),_transparent_34%),linear-gradient(140deg,_#040712_0%,_#070a16_55%,_#02040a_100%)]">
    <div class="max-w-3xl mx-auto p-6">
        <section class="rounded-3xl border border-cyan-300/30 bg-slate-900/75 p-6 shadow-[0_24px_48px_rgba(37,99,235,0.35)] backdrop-blur-xl">
            <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-fuchsia-300 mb-5">Edit Task Mode</h1>

            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-5 p-5 rounded-2xl border border-indigo-300/20 bg-slate-900/60">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-semibold text-cyan-100">Title</label>
                    <input type="text" name="title" id="title" value="{{ $task->title }}" required class="mt-1 w-full rounded-xl border border-cyan-500/40 bg-slate-800 px-3 py-2 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-fuchsia-300" />
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-cyan-100">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 w-full rounded-xl border border-cyan-500/40 bg-slate-800 px-3 py-2 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-fuchsia-300">{{ $task->description }}</textarea>
                </div>

                <div>
                    <label for="priority" class="block text-sm font-semibold text-cyan-100">Priority</label>
                    <div class="mt-2">
                        <input type="range" name="priority" id="priority" min="1" max="4" value="{{ match($task->priority) { 'Low' => 1, 'Normal' => 2, 'High' => 3, 'Urgent' => 4, default => 2 } }}" class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer slider" />
                        <div class="flex justify-between text-xs text-cyan-300 mt-1">
                            <span>Low</span>
                            <span>Normal</span>
                            <span>High</span>
                            <span>Urgent</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <input type="hidden" name="is_completed" id="is_completed_hidden" value="{{ $task->is_completed ? '1' : '0' }}" />
                    <button type="button" id="completedToggle" class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold transition focus:outline-none focus-visible:ring-4" aria-pressed="{{ $task->is_completed ? 'true' : 'false' }}" style="background-color: {{ $task->is_completed ? '#10b981' : '#f59e0b' }}; color: white;">
                        <span id="completedToggleText">{{ $task->is_completed ? 'Completed' : 'Pending' }}</span>
                    </button>
                </div>

                <script>
                    const completedToggle = document.getElementById('completedToggle');
                    const completedHidden = document.getElementById('is_completed_hidden');
                    const completedText = document.getElementById('completedToggleText');

                    completedToggle.addEventListener('click', () => {
                        const isCompleted = completedHidden.value === '1';
                        completedHidden.value = isCompleted ? '0' : '1';
                        completedToggle.setAttribute('aria-pressed', !isCompleted);
                        completedToggle.style.backgroundColor = isCompleted ? '#f59e0b' : '#10b981';
                        completedText.textContent = isCompleted ? 'Pending' : 'Completed';
                    });
                </script>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" class="rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-400 px-6 py-2.5 text-white font-semibold shadow-lg shadow-fuchsia-500/40 transition hover:scale-[1.02] focus:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300">Update</button>
                    <a href="/tasks" class="rounded-xl border border-cyan-300/40 px-6 py-2.5 text-cyan-100 hover:bg-cyan-500/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">Back to Tasks</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>