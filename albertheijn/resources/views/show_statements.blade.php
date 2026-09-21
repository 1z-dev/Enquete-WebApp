<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellingen&Antwoorden</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css" rel="stylesheet">
    
    <script>
        window.questionnaire = {
            statements: @json($statements),
            answerUrl: "{{ route('statements.answer') }}",
            finishedUrl: "{{ route('statements.finished') }}"
        };
    </script>

    <script src="{{ asset('js/game_functions.js') }}" defer></script>

</head>

<body>
    <container class="h-screen flex items-center justify-center">
        <main class="flex flex-col items-center text-center gap-5">
            <h1 id="statement" class="p-5 border-2 border-black rounded-2xl"></h1>
            <p id="context" class="p-5 border-2 border-black rounded-2xl"></p>
            <div class="flex gap-5">
                <button type="button" id="answer-1" class="px-5 py-3 border-2 bg-blue-700 rounded-xl">Eens</button>
                <button type="button" id="answer-2" class="px-5 py-3 border-2 bg-blue-700 rounded-xl">Oneens</button>
            </div>
        </main>
    </container>

</body>
</html>