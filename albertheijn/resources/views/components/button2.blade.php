@props([
    'href' => '#',
    'icon' => null,
    'size' => 'medium',
    'width' => 'auto',
    'bg' => 'bg-[#C64738]',
    'border' => 'border-[#283d3b]',
    'text' => 'text-[#EADED6]',
    'hoverBg' => 'hover:bg-[#283d3b]',
    'hoverText' => 'hover:text-[#EADED6]',
])

@php
    $sizes = [
        'small' => 'px-4 py-3 text-sm',
        'medium' => 'px-6 py-5 text-lg',
        'large' => 'px-8 py-6 text-xl',
    ];

    $widthClass = $width === 'auto' ? 'w-fit' : $width;
@endphp

<button
    type="button"
    class="inline-flex {{ $widthClass }} items-center justify-between rounded-2xl
        {{ $sizes[$size] ?? $sizes['medium'] }}
        {{ $bg }} border-2 {{ $border }} {{ $text }}
        font-bold transition {{ $hoverBg }} {{ $hoverText }} active:scale-[0.98]"
>
    <span>{{ $slot }}</span>
    <span class="text-xl">{{ $icon }}</span>
</button>

{{-- usage example
<x-button2 
type="button" 
icon="🔥" 
size="medium"/"large"/"small" 
text="text-[#EADED6]" 
bg="bg-[#C64738]" 
hoverBg="hover:bg-[#283d3b]"
hoverText="hover:text-[#EADED6]"
border="border-[#283d3b]"
width="auto"/"w-50" >
    Click Me
</x-button2> --}}