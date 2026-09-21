@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'labelColor' => 'text-[#264646]',
])

<div class="space-y-2">
    @if ($label)
        <label for="{{ $name }}" class="{{ $labelColor }} mt-3">
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border border-[#264646]/25 bg-[#EADED6] px-4 py-3 text-[#264646] outline-none transition placeholder:text-[#264646]/45 focus:border-[#207C83] focus:ring-2 focus:ring-[#207C83]/25',
        ]) }}
        @if ($required) required @endif
    >
</div>
    
{{-- Usage example:
    <x-textinput
        name="email"
        type="email"
        label="Email address"
        placeholder="you@example.com"
        required="true"
    /> --}}