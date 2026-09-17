<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-10">
            <div class="mb-10">
                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Component test page
                </h1>

                <x-form header="test form header">
                </x-form>

                <x-button 
                href="/" 
                size="medium" 
                text="text-[#EADED6]" 
                bg="bg-[#C64738]" 
                border="border-[#283d3b]"
                width="auto"
                hoverBg="hover:bg-[#772e25]"
                hoverText="hover:text-[#EADED6]">
                    go back
                </x-button>

                <x-textinput
                    name="example"
                    type="email"
                    label="Example"
                    placeholder="oooo example text input"
                />
            </div>
        </section>
    </div>
</x-layout>
