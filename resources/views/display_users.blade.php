<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users Records</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.15; }
            50% { opacity: 0.3; }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .ambient-glow {
            animation: pulseGlow 8s ease-in-out infinite;
        }
        .perspective-1000 {
            perspective: 1000px;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen p-4 md:p-8 font-sans antialiased relative overflow-x-hidden perspective-1000">

    <div class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] bg-indigo-500/10 rounded-full blur-[120px] pointer-events-none ambient-glow"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50vw] h-[50vw] bg-blue-500/10 rounded-full blur-[120px] pointer-events-none ambient-glow" style="animation-delay: -4s;"></div>

    <div class="max-w-5xl mx-auto space-y-6 animate-fade-in-up">

        <nav class="bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-2xl px-6 py-4 shadow-[0_15px_35px_rgba(0,0,0,0.4)] flex justify-between items-center transform hover:translate-y-[-2px] hover:shadow-[0_20px_40px_rgba(99,102,241,0.15)] transition-all duration-300">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-indigo-500/10 border border-indigo-500/20 rounded-xl">
                    <i data-lucide="database" class="w-5 h-5 text-indigo-400"></i>
                </div>
                <div class="text-xl font-black tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-purple-400">DB_ROUTER</div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('show.form') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-800 hover:border-slate-600 bg-slate-950/40 hover:bg-slate-950/80 text-slate-300 hover:text-white font-medium text-sm transition-all duration-200">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    <span>Form View</span>
                </a>
                <a href="{{ route('display.users') }}" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-500 hover:to-blue-500 font-semibold shadow-lg shadow-indigo-500/20 text-sm transform active:scale-95 transition-all duration-200 border-t border-white/20">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Display Users</span>
                </a>
            </div>
        </nav>

        <div class="bg-slate-900/40 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-white/10 shadow-[0_25px_60px_rgba(0,0,0,0.4)] relative overflow-hidden">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-8 pb-6 border-b border-slate-800/60">
                <div>
                    <h1 class="text-2xl font-black tracking-wide text-white flex items-center gap-2">
                        <span>USER RECORDS REPOSITORY</span>
                    </h1>
                    <p class="text-slate-400 text-xs mt-1 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Currently inspecting table data from selected database scope.
                    </p>
                </div>

                <form action="{{ route('display.users') }}" method="GET" class="w-full sm:w-64">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-1.5">Switch Connected DB</label>
                    <div class="relative group">
                        <select name="db_connection" onchange="this.form.submit()" 
                            class="w-full bg-slate-950 border border-slate-800 group-hover:border-indigo-500/50 rounded-xl px-4 py-3 text-xs text-slate-200 font-bold focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/50 transition-all cursor-pointer appearance-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]">
                            <option value="mysql" {{ $selectedDb == 'mysql' ? 'selected' : '' }}>Student DB</option>
                            <option value="mysql_second" {{ $selectedDb == 'mysql_second' ? 'selected' : '' }}>Teacher DB</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 group-hover:text-indigo-400 transition-colors">
                            <i data-lucide="chevrons-up-down" class="w-4 h-4"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-800/80 shadow-[inset_0_4px_20px_rgba(0,0,0,0.6)] bg-slate-950/40">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 bg-slate-950/90 text-slate-400 text-[11px] font-bold uppercase tracking-wider">
                            <th class="px-6 py-4.5">ID</th>
                            <th class="px-6 py-4.5">Name</th>
                            <th class="px-6 py-4.5">Email</th>
                            <th class="px-6 py-4.5">Role</th>
                            <th class="px-6 py-4.5 text-center">Identity Token</th>
                            <th class="px-6 py-4.5 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-900/60 text-sm font-medium">
                        @forelse($users_data as $user)
                            <tr class="hover:bg-indigo-500/[0.03] transition-colors duration-150 group">
                                <td class="px-6 py-4 text-indigo-400/70 font-mono text-xs">#{{ $user->id }}</td>
                                <td class="px-6 py-4 text-slate-200 group-hover:text-white transition-colors">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-slate-800 to-slate-900 border border-white/5 flex items-center justify-center text-xs font-bold text-slate-400 capitalize">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-400 font-normal">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 text-[10px] rounded-lg font-extrabold tracking-wider uppercase bg-slate-900 border border-slate-800 text-slate-300 shadow-sm">
                                        {{ $user->role ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-mono text-xs text-slate-500">
                                    @if($user->remember_token)
                                        <span class="inline-flex items-center gap-1 bg-slate-900/80 px-2 py-1 rounded border border-white/5 max-w-[150px] truncate text-slate-400">
                                            <i data-lucide="key-round" class="w-3 h-3 text-slate-500"></i>
                                            {{ Str::limit($user->remember_token, 12) }}
                                        </span>
                                    @else
                                        <span class="text-slate-600 italic">No Token</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('update.password', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="db_connection" value="{{ $selectedDb }}">
                                
                                        <button type="submit" 
                                            onclick="return confirm('Are you sure you want to update password for this user?')"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold uppercase tracking-wider rounded-xl bg-gradient-to-r from-amber-600 to-rose-600 hover:from-amber-500 hover:to-rose-500 text-white shadow-lg shadow-rose-950/50 active:scale-95 transform transition-all duration-200 cursor-pointer border-t border-white/20 hover:translate-y-[-1px]">
                                            <i data-lucide="shield-alert" class="w-3.5 h-3.5"></i>
                                            <span>Update Pass</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-slate-500 font-medium tracking-wide">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div class="p-4 bg-slate-900/60 rounded-2xl border border-slate-800">
                                            <i data-lucide="folder-open" class="w-8 h-8 text-slate-600"></i>
                                        </div>
                                        <p class="text-sm">No user records detected inside this database environment.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>