@props([
    'header' => 'Formulier',
    'action' => '',
    'method' => 'POST',
    'fields' => [],
    'submitText' => 'Verzenden',
])

{{--
    Usage example:

    <x-form
        header="Contact"
        action="{{ route('contact.store') }}"
        method="POST"
        :fields="[
            ['name' => 'naam', 'label' => 'Naam', 'placeholder' => 'Vul je naam in', 'required' => true],
            ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'placeholder' => 'voorbeeld@email.nl', 'required' => true],
            ['name' => 'bericht', 'label' => 'Bericht', 'type' => 'textarea', 'placeholder' => 'Typ je bericht...'],
        ]"
        submitText="Versturen"
    >
        <p class="text-sm text-[#EADED6]">We reageren binnen 24 uur.</p>
    </x-form>
--}}

<div class="mx-auto m-4 max-w-lg rounded-2xl bg-[#264646] p-8 shadow-xl">
    <form
        method="{{ $method }}"
        action="{{ $action }}"
        class="space-y-6"
    >
        @csrf

        <h2 class="text-2xl font-bold text-[#EADED6]">
            {{ $header }}
        </h2>

        @foreach ($fields as $field)
            <x-textinput
                :name="$field['name']"
                :type="$field['type'] ?? 'text'"
                :label="$field['label'] ?? null"
                :placeholder="$field['placeholder'] ?? ''"
                :value="$field['value'] ?? ''"
                :required="$field['required'] ?? false"
                :labelColor="$field['labelColor'] ?? 'text-[#EADED6]'"
            />
        @endforeach

        {{ $slot }}

        <button
            type="submit"
            class="mt-6 rounded-2xl bg-[#C64738] px-4 py-3 font-bold text-[#EADED6] transition hover:bg-[#283d3b]"
        >
            {{ $submitText }}
        </button>
    </form>
</div>