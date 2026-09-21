<x-layout>
    <div class="flex min-h-[calc(100vh-145px)] flex-col">
        <section class="flex flex-col justify-center py-10">
            <div class="mb-10">
                <h1 class="max-w-sm mb-4 text-5xl font-bold leading-[0.95] text-[#264646]">
                    Component test page
                </h1>

                <x-form
                    header="Formulier"
                    action=""
                    submitText="opslaan"
                    :fields="[
                        [
                            'name' => 'name',
                            'label' => 'Naam',
                            'placeholder' => 'Vul je naam in',
                            'required' => true,
                        ],
                        [
                            'name' => 'email',
                            'type' => 'email',
                            'label' => 'E-mailadres',
                            'placeholder' => 'naam@example.com',
                            'required' => true,
                        ],
                        [
                            'name' => 'age',
                            'type' => 'number',
                            'label' => 'Leeftijd',
                            'min' => 0,
                            'required' => true,
                        ],
                    ]"
                />

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
                <x-statistic :statistics="[
                    ['label' => 'Question 1', 'eens' => 10, 'oneens' => 5],
                    ['label' => 'Question 2', 'eens' => 7, 'oneens' => 8],
                    ['label' => 'Question 3', 'eens' => 12, 'oneens' => 3],
                    ['label' => 'Question 4', 'eens' => 5, 'oneens' => 10],
                    ['label' => 'Question 5', 'eens' => 8, 'oneens' => 7],
                ]" />
            </div>
        </section>
    </div>
</x-layout>