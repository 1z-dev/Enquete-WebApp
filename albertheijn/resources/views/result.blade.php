
<x-layout>
    <script>
        window.statistics = @json($statistics);
    </script>

    <script src="{{ asset('js/route_system.js') }}" defer></script>

    <img src="" id="outcome" alt="outcome" class="fixed inset-0 w-screen h-screen object-cover m-0 p-0 -z-10">

    <div class="flex min-h-[calc(100vh-145px)] items-center justify-center">
        <x-button
            href="/contact"
            size="medium"
            text="text-[#EADED6]"
            bg="bg-[#C64738]"
            hoverBg="hover:bg-[#283d3b]"
            hoverText="hover:text-[#EADED6]"
            border="border-[#283d3b]"
            width="auto">
            Verder
        </x-button>
    </div>


</x-layout>