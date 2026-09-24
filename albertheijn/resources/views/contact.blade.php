<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-10">
            <div class="mb-10">
                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Contact
                </h1>
                <x-form
                    action="{{ route('contact.submit') }}"
                    method="POST"
                    header="Contact"
                    :fields="[
                        ['name' => 'naam', 'label' => 'Naam', 'placeholder' => 'Vul je naam in'],
                        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'placeholder' => 'voorbeeld@email.nl', 'required' => true],
                        ['name' => 'leeftijd', 'label' => 'Leeftijd', 'type' => 'number', 'placeholder' => 'Typ je leeftijd...', 'required' => true],
                    ]"
                    submitText="Versturen"
                />
                <x-statistic :statistics="$statistics" />
            </div>
        </section>
    </div>
</x-layout>