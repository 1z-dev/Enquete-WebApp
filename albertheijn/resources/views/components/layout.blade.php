<!DOCTYPE html>
<html lang="nl" class="h-full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Smart Cities</title>

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>

    <body class="min-h-full bg-[#EADED6] text-[#264646] antialiased">
        <header class="bg-[#264646] text-[#EADED6]">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">
                <a href="/" class="text-xl font-bold tracking-tight text-[#EADED6]">
                    Paden Van Verstand
                </a>

                <nav class="flex gap-6 text-sm">
                    <a href="/" class="transition hover:text-[#207C83]">Home</a>
                    <a href="{{ route('login') }}" class="transition hover:text-[#207C83]">Login</a>
                    <a href="/admin/stellingen" class="transition hover:text-[#207C83]">Admin</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto min-h-[calc(100vh-145px)] max-w-6xl px-6">
            {{ $slot }}
        </main>
    </body>
</html>