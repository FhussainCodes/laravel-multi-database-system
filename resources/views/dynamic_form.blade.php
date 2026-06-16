<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic 3D Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.98) rotateX(4deg);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1) rotateX(0);
            }
        }
        .animate-3d-entry {
            animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            perspective: 1000px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-slate-100 flex items-center justify-center min-h-screen p-4 font-sans antialiased overflow-x-hidden">

    <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none animate-pulse" style="animation-duration: 4s;"></div>

    <div class="w-full max-w-xl bg-slate-900/60 backdrop-blur-xl p-8 rounded-3xl border border-slate-700/60 shadow-[0_20px_50px_rgba(99,102,241,0.15)] hover:shadow-[0_30px_60px_rgba(99,102,241,0.25)] hover:border-indigo-500/40 transition-all duration-500 transform animate-3d-entry tracking-normal">
        
        <h1 class="text-3xl font-black mb-8 text-center tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-300 to-purple-400 uppercase drop-shadow-[0_2px_10px_rgba(99,102,241,0.3)]">
            Dynamic Database Form
        </h1>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm font-medium flex items-center gap-2 transform transition-all duration-300 animate-bounce">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('store.form') }}" method="POST" autocomplete="off" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Name</label>
                    <input type="text" name="name" placeholder="please enter name" required
                        class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Email</label>
                    <input type="email" name="email" placeholder="admin@gmail.com" required
                        class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Role</label>
                    <input type="text" name="role" placeholder="admin, teacher..."
                        class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-rose-400">Password</label>
                    <input type="password" name="password" placeholder="********" autocomplete="new-password" minlength="8" required
                        class="w-full bg-slate-950/80 border @error('password') border-rose-500/80 focus:border-rose-500 focus:ring-rose-500/10 @else border-slate-800 focus:border-indigo-500 focus:ring-indigo-500/10 @enderror rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                    @error('password')
                        <p class="text-rose-400 text-xs mt-1.5 font-semibold tracking-wide animate-pulse">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Email Verified At</label>
                    <input type="text" name="email_verified_at" placeholder="Optional"
                        class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Remember Token</label>
                    <input type="text" name="remember_token" placeholder="Optional"
                        class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] hover:border-slate-700 transition-all duration-300 transform hover:-translate-y-0.5">
                </div>
            </div>

            <hr class="border-slate-800/80 my-4">

            <div class="group">
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 transition-colors group-focus-within:text-indigo-400">Select Target Database</label>
                <div class="relative">
                    <select name="db_connection" required
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-lg transition-all duration-300 cursor-pointer appearance-none transform hover:-translate-y-0.5">
                        <option value="" class="bg-slate-900 text-slate-400">Select Database</option>
                        <option value="mysql" class="bg-slate-900 text-slate-100">Student DB (mysql)</option>
                        <option value="mysql_second" class="bg-slate-900 text-slate-100">Teacher DB (mysql_second)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <button type="submit" 
                class="w-full relative group/btn overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold py-4 px-4 rounded-xl transition-all duration-300 shadow-[0_4px_15px_rgba(99,102,241,0.4)] hover:shadow-[0_10px_25px_rgba(99,102,241,0.6)] transform hover:-translate-y-1 active:translate-y-0 active:scale-[0.98] mt-4 cursor-pointer tracking-wider uppercase text-sm border-t border-white/20">
                <span class="relative z-10">Save User Record 🚀</span>
                <div class="absolute inset-0 w-full h-full bg-white/10 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
            </button>

        </form>
    </div>

</body>
</html>