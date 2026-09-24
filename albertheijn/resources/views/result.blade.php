
<x-layout>
    <script>
        window.statistics = @json($statistics);
    </script>

    <script src="{{ asset('js/route_system.js') }}" defer></script>

    <img src="" id="outcome" alt="outcome" class="fixed inset-0 w-screen h-screen object-cover m-0 p-0 -z-10">


</x-layout>