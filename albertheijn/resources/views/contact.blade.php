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
                        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'placeholder' => 'voorbeeld@email.nl'],
                        ['name' => 'leeftijd', 'label' => 'Leeftijd', 'type' => 'number', 'placeholder' => 'Typ je leeftijd...', 'required' => true],
                    ]"
                    submitText="Versturen"
                >
                    <label class="flex items-start gap-2 text-sm text-[#EADED6]">
                        <input type="checkbox" name="tos" value="1" required class="mt-1">
                        <span>Ik ga akkoord met de <a href="#" class="underline">voorwaarden</a></span>
                    </label>
                </x-form>
                <x-statistic :statistics="$statistics" />
            </div>
        </section>
    </div>
</x-layout>