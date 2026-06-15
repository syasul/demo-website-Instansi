<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Sedang Pemeliharaan - LSP Jember</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lsp-bg text-lsp-text font-body min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full glass-effect rounded-3xl p-8 text-center space-y-6 shadow-2xl relative overflow-hidden border border-white/5">
        <!-- Glow accents -->
        <div class="absolute -top-20 -left-20 h-40 w-40 bg-lsp-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 h-40 w-40 bg-lsp-accent/20 rounded-full blur-3xl"></div>

        <div class="h-20 w-20 mx-auto rounded-2xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white text-3xl shadow-xl shadow-lsp-primary/20 animate-pulse">
            ⚙️
        </div>

        <div class="space-y-2 relative z-10">
            <h1 class="font-heading font-bold text-2xl text-white">DALAM PEMELIHARAAN</h1>
            <p class="text-sm text-lsp-muted leading-relaxed">
                Kami sedang melakukan pembaruan sistem berkala untuk meningkatkan kualitas layanan asesmen Anda. Kami akan segera kembali online!
            </p>
        </div>

        <div class="pt-4 border-t border-white/5 relative z-10 text-xs text-slate-500">
            <p>LSP Jember &middot; Hubungi Customer Service untuk Urgensi</p>
            <p class="mt-2 font-medium">Powered by inxdvi</p>
        </div>
    </div>
</body>
</html>
