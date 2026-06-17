<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic 3D Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px) scale(0.98) rotateX(4deg); }
            to { opacity: 1; transform: translateY(0) scale(1) rotateX(0); }
        }
        .animate-3d-entry { animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; perspective: 1000px; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-slate-100 min-h-screen p-4 font-sans antialiased overflow-x-hidden">

    <nav class="max-w-5xl mx-auto mb-12 bg-slate-900/60 backdrop-blur-md border border-slate-800 rounded-2xl px-6 py-4 shadow-[0_10px_30px_rgba(0,0,0,0.5)] flex justify-between items-center transform hover:scale-[1.01] transition-all duration-300">
        <div class="text-xl font-black tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">DB_ROUTER</div>
        <div class="flex gap-4">
            <a href="{{ route('show.form') }}" class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 font-semibold shadow-lg shadow-indigo-500/20 text-sm transform active:scale-95 transition-all">Form View</a>
            <a href="{{ route('display.users') }}" class="px-4 py-2 rounded-xl border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-semibold text-sm transition-all">Display Users</a>
        </div>
    </nav>

    <div class="flex justify-center items-center">
        <div class="w-full max-w-xl bg-slate-900/60 backdrop-blur-xl p-8 rounded-3xl border border-slate-700/60 shadow-[0_20px_50px_rgba(99,102,241,0.15)] hover:shadow-[0_30px_60px_rgba(99,102,241,0.25)] hover:border-indigo-500/40 transition-all duration-500 transform animate-3d-entry">
            
            <h1 class="text-3xl font-black mb-8 text-center tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-300 to-purple-400 uppercase drop-shadow-[0_2px_10px_rgba(99,102,241,0.3)]">
                Dynamic Database Form
            </h1>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm font-medium flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('store.form') }}" method="POST" autocomplete="off" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Name</label>
                        <input type="text" name="name" placeholder="please enter name" required class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                    </div>
                    <div class="group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Email</label>
                        <input type="email" name="email" placeholder="admin@gmail.com" required class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Role</label>
                        <input type="text" name="role" placeholder="student, teacher..." class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                    </div>
                    <div class="group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Password</label>
                        <input type="password" name="password" placeholder="********" autocomplete="new-password" minlength="8" required class="w-full bg-slate-950/80 border @error('password') border-rose-500/80 @else border-slate-800 @enderror rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                        @error('password') 
                        <p class="text-rose-400 text-xs mt-1.5 font-semibold animate-pulse">{{ $message }}</p>
                         @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Email Verified At</label>
                        <input type="text" name="email_verified_at" placeholder="Optional" class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Remember Token</label>
                        <input type="text" name="remember_token" placeholder="Optional" class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                    </div>
                </div>

                <hr class="border-slate-800/80 my-4">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Select Target Database</label>
                    <div class="relative">
                        <select name="db_connection" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 cursor-pointer appearance-none transform hover:-translate-y-0.5">
                            <option value="">Select Database</option>
                            <option value="mysql">Student DB </option>
                            <option value="mysql_second">Teacher DB </option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold py-4 px-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 active:scale-[0.98] cursor-pointer tracking-wider uppercase text-sm border-t border-white/20">
                    Save User Record 🚀
                </button>
            </form>
        </div>
    </div>
</body>
</html>