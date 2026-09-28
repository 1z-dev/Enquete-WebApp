<x-layout>
    <div class="space-y-10">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-2 text-sm font-bold uppercase tracking-[0.2em] text-[#197278]">Beheer</p>
                <h1 class="text-4xl font-bold leading-tight text-[#264646] sm:text-5xl">
                    Stellingen
                </h1>
                <p class="mt-3 max-w-2xl text-base leading-7 text-[#264646]/75">
                    Voeg stellingen toe, pas bestaande stellingen aan of verwijder ze uit het systeem.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a
                    href="/"
                    class="inline-flex w-fit items-center rounded-2xl border-2 border-[#283d3b] bg-[#EADED6] px-5 py-3 font-bold text-[#264646] transition hover:bg-[#283d3b] hover:text-[#EADED6]"
                >
                    ← Terug
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-2xl border-2 border-[#C64738] bg-transparent px-5 py-3 font-bold text-[#C64738] transition hover:bg-[#C64738] hover:text-[#EADED6]"
                    >
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border-2 border-[#197278] bg-[#d7ece9] px-5 py-4 font-semibold text-[#264646]" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border-2 border-[#C64738] bg-[#f5d9d4] px-5 py-4 text-[#772e25]" role="alert">
                <p class="font-bold">Controleer je invoer:</p>
                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="rounded-3xl border-2 border-[#283d3b] bg-[#f1e8e2] p-6 shadow-sm sm:p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-[#264646]">Nieuwe stelling</h2>
                <p class="mt-1 text-sm text-[#264646]/70">De context is optioneel en kan extra uitleg bevatten.</p>
            </div>

            <form method="POST" action="{{ route('admin.stellingen.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="stelling" class="mb-2 block text-sm font-bold text-[#264646]">Stelling</label>
                    <input
                        id="stelling"
                        name="stelling"
                        type="text"
                        value="{{ old('stelling') }}"
                        maxlength="255"
                        required
                        placeholder="Bijvoorbeeld: Albert Heijn moet meer lokale producten aanbieden."
                        class="w-full rounded-2xl border-2 border-[#283d3b]/40 bg-[#EADED6] px-4 py-3 text-[#264646] outline-none transition placeholder:text-[#264646]/45 focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                    >
                </div>

                <div>
                    <label for="context" class="mb-2 block text-sm font-bold text-[#264646]">Context <span class="font-normal opacity-60">(optioneel)</span></label>
                    <textarea
                        id="context"
                        name="context"
                        rows="4"
                        placeholder="Geef eventueel extra context bij de stelling."
                        class="w-full resize-y rounded-2xl border-2 border-[#283d3b]/40 bg-[#EADED6] px-4 py-3 text-[#264646] outline-none transition placeholder:text-[#264646]/45 focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                    >{{ old('context') }}</textarea>
                </div>

                <button
                    type="submit"
                    class="inline-flex items-center rounded-2xl border-2 border-[#283d3b] bg-[#C64738] px-6 py-4 font-bold text-[#EADED6] transition hover:bg-[#772e25] active:scale-[0.98]"
                >
                    + Stelling toevoegen
                </button>
            </form>
        </section>

        <section class="space-y-4">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-[#264646]">Bestaande stellingen</h2>
                    <p class="text-sm text-[#264646]/65">{{ $stellingen->count() }} {{ $stellingen->count() === 1 ? 'stelling' : 'stellingen' }}</p>
                </div>
            </div>

            @forelse ($stellingen as $stelling)
                <article
                    id="stelling-{{ $stelling->id }}"
                    class="rounded-3xl border-2 border-[#283d3b] bg-[#EADED6] p-5 sm:p-6"
                >
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <div class="min-w-0 flex-1">
                            <div class="mb-3 flex flex-wrap items-center gap-2">
                                <span class="rounded-full bg-[#264646] px-3 py-1 text-xs font-bold text-[#EADED6]">
                                    #{{ $loop->iteration }}
                                </span>
                                @if ($stelling->aangemaakt_op)
                                    <span class="text-xs text-[#264646]/60">
                                        Aangemaakt {{ $stelling->aangemaakt_op->format('d-m-Y H:i') }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold leading-7 text-[#264646]">
                                {{ $stelling->stelling }}
                            </h3>

                            @if ($stelling->context)
                                <p class="mt-3 whitespace-pre-line text-sm leading-6 text-[#264646]/75">
                                    {{ $stelling->context }}
                                </p>
                            @endif
                        </div>

                        <div class="flex shrink-0 flex-wrap gap-3">
                            <button
                                type="button"
                                data-edit-button
                                data-id="{{ $stelling->id }}"
                                class="rounded-2xl border-2 border-[#283d3b] bg-[#197278] px-5 py-3 font-bold text-[#EADED6] transition hover:bg-[#264646]"
                            >
                                Bewerken
                            </button>

                            <form method="POST" action="{{ route('admin.stellingen.destroy', $stelling) }}" onsubmit="return confirm('Weet je zeker dat je deze stelling wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="rounded-2xl border-2 border-[#C64738] bg-transparent px-5 py-3 font-bold text-[#C64738] transition hover:bg-[#C64738] hover:text-[#EADED6]"
                                >
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>

                    <form
                        method="POST"
                        action="{{ route('admin.stellingen.update', $stelling) }}"
                        data-edit-form="{{ $stelling->id }}"
                        class="mt-6 hidden space-y-5 border-t-2 border-[#283d3b]/15 pt-6"
                    >
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="stelling-{{ $stelling->id }}" class="mb-2 block text-sm font-bold text-[#264646]">Stelling</label>
                            <input
                                id="stelling-{{ $stelling->id }}"
                                name="stelling"
                                type="text"
                                value="{{ $stelling->stelling }}"
                                maxlength="255"
                                required
                                class="w-full rounded-2xl border-2 border-[#283d3b]/40 bg-[#f1e8e2] px-4 py-3 text-[#264646] outline-none transition focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                            >
                        </div>

                        <div>
                            <label for="context-{{ $stelling->id }}" class="mb-2 block text-sm font-bold text-[#264646]">Context <span class="font-normal opacity-60">(optioneel)</span></label>
                            <textarea
                                id="context-{{ $stelling->id }}"
                                name="context"
                                rows="4"
                                class="w-full resize-y rounded-2xl border-2 border-[#283d3b]/40 bg-[#f1e8e2] px-4 py-3 text-[#264646] outline-none transition focus:border-[#197278] focus:ring-2 focus:ring-[#197278]/20"
                            >{{ $stelling->context }}</textarea>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button
                                type="submit"
                                class="rounded-2xl border-2 border-[#283d3b] bg-[#C64738] px-5 py-3 font-bold text-[#EADED6] transition hover:bg-[#772e25]"
                            >
                                Wijzigingen opslaan
                            </button>
                            <button
                                type="button"
                                data-cancel-button="{{ $stelling->id }}"
                                class="rounded-2xl border-2 border-[#283d3b] bg-transparent px-5 py-3 font-bold text-[#264646] transition hover:bg-[#283d3b] hover:text-[#EADED6]"
                            >
                                Annuleren
                            </button>
                        </div>
                    </form>
                </article>
            @empty
                <div class="rounded-3xl border-2 border-dashed border-[#283d3b]/35 bg-[#EADED6] p-10 text-center">
                    <p class="text-lg font-bold text-[#264646]">Nog geen stellingen.</p>
                    <p class="mt-1 text-sm text-[#264646]/65">Voeg hierboven je eerste stelling toe.</p>
                </div>
            @endforelse
        </section>
    </div>

    <script>
        document.querySelectorAll('[data-edit-button]').forEach((button) => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const form = document.querySelector(`[data-edit-form="${id}"]`);

                if (form) {
                    form.classList.remove('hidden');
                    form.querySelector('input')?.focus();
                }
            });
        });

        document.querySelectorAll('[data-cancel-button]').forEach((button) => {
            button.addEventListener('click', () => {
                const form = document.querySelector(`[data-edit-form="${button.dataset.cancelButton}"]`);

                if (form) {
                    form.classList.add('hidden');
                }
            });
        });
    </script>
</x-layout>
