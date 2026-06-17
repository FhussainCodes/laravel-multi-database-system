<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users Records</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-slate-100 min-h-screen p-4 font-sans antialiased">

    <nav class="max-w-5xl mx-auto mb-12 bg-slate-900/60 backdrop-blur-md border border-slate-800 rounded-2xl px-6 py-4 shadow-[0_10px_30px_rgba(0,0,0,0.5)] flex justify-between items-center transform hover:scale-[1.01] transition-all duration-300">
        <div class="text-xl font-black tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">DB_ROUTER</div>
        <div class="flex gap-4">
            <a href="{{ route('show.form') }}" class="px-4 py-2 rounded-xl border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-semibold text-sm transition-all">Form View</a>
            <a href="{{ route('display.users') }}" class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 font-semibold shadow-lg shadow-indigo-500/20 text-sm transform active:scale-95 transition-all">Display Users</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto bg-slate-900/40 backdrop-blur-xl p-8 rounded-3xl border border-slate-800/80 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
        
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-black tracking-wide text-white uppercase">User Records Repository</h1>
                <p class="text-slate-400 text-xs mt-1">Currently inspecting table data from selected database scope.</p>
            </div>

            <form action="{{ route('display.users') }}" method="GET" class="w-full sm:w-64">
                <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1.5">Switch Connected DB</label>
                <div class="relative">
                    <select name="db_connection" onchange="this.form.submit()" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-indigo-400 font-bold focus:outline-none focus:border-indigo-500 transition-all cursor-pointer appearance-none shadow-inner">
                        <option value="mysql" {{ $selectedDb == 'mysql' ? 'selected' : '' }} selected>Student DB </option>
                        <option value="mysql_second" {{ $selectedDb == 'mysql_second' ? 'selected' : '' }}>Teacher DB </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-slate-800/60 shadow-[inset_0_4px_12px_rgba(0,0,0,0.8)] bg-slate-950/40">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-950/80 text-slate-400 text-[11px] font-bold uppercase tracking-wider">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4 text-center">Identity Token/Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-900/60 text-sm font-medium">
                    @forelse($users_data as $user)
                        <tr class="hover:bg-indigo-600/5 transition-colors duration-200 group">
                            <td class="px-6 py-4 text-slate-500 font-mono text-xs">#{{ $user->id }}</td>
                            <td class="px-6 py-4 text-slate-200 group-hover:text-indigo-400 transition-colors">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-slate-400 font-normal">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-[11px] rounded-md font-bold tracking-wide uppercase bg-slate-800/80 text-slate-300 border border-slate-700/50">
                                    {{ $user->role ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center font-mono text-xs text-slate-600 truncate max-w-[150px]">
                                {{ $user->remember_token ? Str::limit($user->remember_token, 15) : 'No Token Set' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                        <form action="{{ route('update.password', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="db_connection" value="{{ $selectedDb }}">
                    
                            <button type="submit" 
                                onclick="return confirm('Are you sure you want to update password for this user?')"
                                class="px-3 py-1.5 text-xs font-bold uppercase tracking-wider rounded-lg bg-gradient-to-r from-amber-600 to-rose-600 hover:from-amber-500 hover:to-rose-500 text-white shadow-md shadow-rose-950/40 active:scale-95 transition-all cursor-pointer border-t border-white/10">
                                Update Pass ⚡
                            </button>
                </form>
            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500 font-medium tracking-wide">
                                🌌 No user records detected inside this database environment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>