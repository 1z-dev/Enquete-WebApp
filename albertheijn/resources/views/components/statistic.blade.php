@props(['statistics' => []])

@php
    $maximum = collect($statistics)
        ->flatMap(fn ($statistic) => [$statistic['1'], $statistic['0']])
        ->max() ?: 1;
@endphp

<div class="rounded-2xl bg-[#264646] p-6 shadow-xl">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-[#EADED6]">
            Antwoorden
        </h2>

        <div class="flex gap-4 text-sm text-[#EADED6]">
            <span>
                <i class="mr-1 inline-block h-3 w-3 bg-[#197278]"></i>
                Eens
            </span>
            <span>
                <i class="mr-1 inline-block h-3 w-3 bg-[#C64738]"></i>
                Oneens
            </span>
        </div>
    </div>

    <div class="overflow-x-auto">
        <div
            class="flex min-w-max items-end gap-8 border-b border-[#EADED6]/40 px-4 pb-0 pt-8"
            style="min-height: 20rem"
        >
            @forelse ($statistics as $statistic)
                @php
                    $eensHeight = ($statistic['1'] / $maximum) * 100;
                    $oneensHeight = ($statistic['0'] / $maximum) * 100;
                @endphp

                <div class="flex w-32 flex-col items-center">
                    <div class="flex h-64 items-end gap-2">
                        <div class="flex h-full flex-col justify-end">
                            <span class="mb-1 text-center text-xs text-[#EADED6]">
                                {{ $statistic['1'] }}
                            </span>

                            <div
                                class="w-10 rounded-t bg-[#197278]"
                                style="height: {{ max($eensHeight, 2) }}%"
                                title="Eens: {{ $statistic['1'] }}"
                            ></div>
                        </div>

                        <div class="flex h-full flex-col justify-end">
                            <span class="mb-1 text-center text-xs text-[#EADED6]">
                                {{ $statistic['0'] }}
                            </span>

                            <div
                                class="w-10 rounded-t bg-[#C64738]"
                                style="height: {{ max($oneensHeight, 2) }}%"
                                title="Oneens: {{ $statistic['0'] }}"
                            ></div>
                        </div>
                    </div>

                    <p class="mt-3 max-w-32 text-center text-sm text-[#EADED6]">
                        {{ $statistic['label'] }}
                    </p>
                </div>
            @empty
                <p class="pb-6 text-[#EADED6]">
                    Er zijn nog geen antwoorden.
                </p>
            @endforelse
        </div>
    </div>
</div>