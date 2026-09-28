<x-layout>
    <div class="mx-auto flex min-h-[70vh] max-w-md items-center justify-center py-12">
        <section class="w-full rounded-3xl border-2 border-[#283d3b] bg-[#f1e8e2] p-7 shadow-sm sm:p-9">
            <div class="mb-8 text-center">
                <p class="mb-2 text-sm font-bold uppercase tracking-[0.2em] text-[#197278]">Beheer</p>
                <h1 class="text-4xl font-bold leading-tight text-[#264646]">Inloggen</h1>
                <p class="mt-3 text-sm leading-6 text-[#264646]/70">
                    Log in om de adminpagina met stellingen te openen.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border-2 border-[#C64738] bg-[#f5d9d4] px-5 py-4 text-sm text-[#772e25]" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-bold text-[#264646]">E-mailadres</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        autofocus
                        class="w-full rounded-2xl border-2 border-[#283d3b]/40 bg-[#EADED6] px-4 py-3 text-[#264646] outline-none transition placeholder:text-[#264646]/45 focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                    >
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-bold text-[#264646]">Wachtwoord</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        class="w-full rounded-2xl border-2 border-[#283d3b]/40 bg-[#EADED6] px-4 py-3 text-[#264646] outline-none transition focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                    >
                </div>

                <label class="flex items-center gap-3 text-sm text-[#264646]/80">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="h-4 w-4 rounded border-[#283d3b]/50 text-[#197278] focus:ring-[#197278]"
                    >
                    Onthoud mij
                </label>

                <button
                    type="submit"
                    class="w-full rounded-2xl border-2 border-[#283d3b] bg-[#C64738] px-6 py-4 font-bold text-[#EADED6] transition hover:bg-[#772e25] active:scale-[0.98]"
                >
                    Inloggen
                </button>
            </form>

            <a
                href="/"
                class="mt-6 block text-center text-sm font-bold text-[#197278] underline-offset-4 hover:underline"
            >
                ← Terug naar de website
            </a>
        </section>
    </div>
</x-layout>
