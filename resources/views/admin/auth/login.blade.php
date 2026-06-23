<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login &mdash; LSP Sanford</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lsp-bg text-lsp-text font-body min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full glass-effect rounded-3xl p-8 border-slate-200/80 space-y-6 shadow-2xl relative overflow-hidden">
        
        <div class="absolute -top-20 -left-20 h-40 w-40 bg-lsp-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 h-40 w-40 bg-lsp-accent/10 rounded-full blur-3xl"></div>

        <div class="space-y-2 text-center relative z-10">
            <h1 class="font-heading font-bold text-2xl text-lsp-text">ADMIN LOGIN</h1>
            <p class="text-xs text-lsp-muted">Masuk untuk mengelola berita, skema, dan pengaturan website.</p>
        </div>

        @if($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-600 text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4 relative z-10">
            @csrf
            
            <div class="space-y-2">
                <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-lsp-muted">Email Admin</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
            </div>

            <div class="space-y-2">
                <label for="password" class="text-[10px] font-bold uppercase tracking-wider text-lsp-muted">Password</label>
                <input type="password" name="password" id="password" required class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
            </div>

            <div class="flex items-center justify-between pt-2">
                <label class="flex items-center space-x-2 text-xs text-lsp-muted select-none cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-slate-200 bg-white text-lsp-primary focus:ring-0">
                    <span>Ingat Saya</span>
                </label>
                
                <a href="{{ route('home') }}" class="text-[10px] font-bold tracking-wider text-lsp-accent hover:text-lsp-primary uppercase">← Kembali</a>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 active:scale-95 transition-all duration-300">
                MASUK SEKARANG
            </button>
        </form>
    </div>
</body>
</html>
