@props([
    'header' => 'Formulier',
    'action' => '',
    'method' => 'POST',
    'fields' => [],
    'submitText' => 'Verzenden',
])

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