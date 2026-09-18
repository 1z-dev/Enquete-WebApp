 <div class="max-w-lg mx-auto bg-[#264646] p-8 m-4 rounded-2xl shadow-xl">
    <form method="POST" action="#" class="space-y-6">
        @csrf
        <h2 class="text-2xl font-bold text-[#EADED6]">
            {{ $header }}
        </h2>
        <x-textinput
            name="name"
            label="Naam"
            placeholder="Vul je naam in"
            required
            labelColor="text-[#EADED6]"
        />

        <x-textinput
            name="email"
            type="email"
            label="E-mailadres"
            placeholder="naam@example.com"
            required
            labelColor="text-[#EADED6]"
        />

        <x-textinput
            name="age"
            type="number"
            label="Leeftijd"
            placeholder="Vul je leeftijd in"
            min="0"
            required
            labelColor="text-[#EADED6]"
        />

        <x-button href="#" size="small" class="mt-6">
            Verzenden
        </x-button>
    </form>
</div>