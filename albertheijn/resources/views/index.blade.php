<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-30">
            <div class="mb-10">

                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Paden Van Verstand
                </h1>

            </div>

            <div class="space-y-4">
                <x-button icon="→" href="/test" bg="bg-[#C64738]" text="text-[#EADED6]" border="border-[#283d3b]" width="w-50">
                    Start
                </x-button>

                <x-button icon="⚙" href="/admin" bg="bg-[#197278]" text="text-[#EADED6]" border="border-[#283d3b]" width="w-50">
                    Admin panel
                </x-button>
            </div>
        </section>
    </div>
</x-layout>