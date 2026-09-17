<a
    href="{{ $href ?? '#' }}"
    class="flex w-full items-center justify-between rounded-2xl {{ $bg ?? '' }} border-2 {{ $border ?? '' }} px-6 py-5 text-lg font-bold {{ $text ?? 'text-[#EADED6]' }} transition hover:bg-[#283d3b] hover:text-[#EADED6] active:scale-[0.98]"
>
    <span>{{ $slot }}</span>
    <span class="text-xl">{{ $icon ?? '' }}</span>
</a>

{{-- Usage example:
    <x-button icon="←" href="/" bg="bg-[#C64738]" text="text-[#EADED6]" border="border-[#283d3b]">
        Go Back
    </x-button> --}}