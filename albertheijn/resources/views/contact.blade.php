<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-10">
            <div class="mb-10">
                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Contact
                </h1>
                <x-form header="Contact Us"/>
                <x-statistic :statistics="$statistics" />
            </div>
        </section>
    </div>
</x-layout>