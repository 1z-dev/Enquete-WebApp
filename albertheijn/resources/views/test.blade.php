<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-30">
            <div class="mb-10">
                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Component test page
                </h1>

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
                    name="email"
                    type="email"
                    label="Email addres"
                    placeholder="you@example.com"
                />
                <x-textinput
                    name="naam"
                    type="text"
                    label="Naam"
                    placeholder="Your name"
                /> 
                <x-textinput
                    name="leeftijd"
                    type="number"
                    label="Leeftijd"
                    placeholder="Your age"
                    required="true"
                />
            </div>
        </section>
    </div>
</x-layout>