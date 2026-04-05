<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
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
<body class="min-h-screen text-slate-100 bg-[radial-gradient(circle_at_80%_0%,_rgba(34,211,238,0.3),_transparent_38%),radial-gradient(circle_at_25%_100%,_rgba(236,72,153,0.26),_transparent_34%),linear-gradient(120deg,_#121828_0%,_#0f1d3f_55%,_#0c1223_100%)] dark:bg-[radial-gradient(circle_at_30%_0%,_rgba(168,85,247,0.40),_transparent_30%),radial-gradient(circle_at_80%_80%,_rgba(34,211,238,0.38),_transparent_38%),linear-gradient(130deg,_#020810_0%,_#0d1022_55%,_#040610_100%)]">
    <div class="max-w-3xl mx-auto p-6">
        <section class="rounded-3xl border border-fuchsia-300/30 bg-slate-900/75 p-6 shadow-[0_25px_50px_rgba(79,70,229,0.32)] backdrop-blur-xl">
            <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-cyan-400 mb-6">Create New Task</h1>

            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5 p-5 rounded-2xl border border-cyan-400/20 bg-slate-900/60">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-cyan-100">Title</label>
                    <input type="text" name="title" id="title" required class="mt-1 w-full rounded-xl border border-cyan-500/40 bg-slate-800 px-3 py-2 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-fuchsia-300" />
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-cyan-100">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 w-full rounded-xl border border-cyan-500/40 bg-slate-800 px-3 py-2 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-fuchsia-300"></textarea>
                </div>

                <div>
                    <label for="priority" class="block text-sm font-semibold text-cyan-100">Priority</label>
                    <div class="mt-2">
                        <input type="range" name="priority" id="priority" min="1" max="4" value="2" class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer slider" />
                        <div class="flex justify-between text-xs text-cyan-300 mt-1">
                            <span>Low</span>
                            <span>Normal</span>
                            <span>High</span>
                            <span>Urgent</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" class="rounded-xl bg-gradient-to-r from-fuchsia-500 to-cyan-400 px-6 py-2.5 text-white font-semibold shadow-lg shadow-fuchsia-500/40 transition hover:scale-[1.02] focus:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300">Create</button>
                    <a href="/tasks" class="rounded-xl border border-cyan-300/40 px-6 py-2.5 text-cyan-100 hover:bg-cyan-500/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">Back to Tasks</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>