<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellingen&Antwoorden</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        window.questionnaire = {
            statements: @json($statements),
            answerUrl: "{{ route('statements.answer') }}",
            finishedUrl: "{{ route('statements.finished') }}"
        };
    </script>

    <script src="{{ asset('resources/js/game_functions.js') }}" defer></script>

</head>

<body>
    <div class="h-screen flex items-center justify-center">
        <div class="flex flex-col items-center text-center gap-5">
            <p id="statement" class="p-5 border-2 border-black rounded-2xl"></p>
            <div class="flex gap-5">
                <button type="button" id="answer-1" class="px-5 py-3 border-2 border-black rounded-xl">Eens</button>
                <button type="button" id="answer-2" class="px-5 py-3 border-2 border-black rounded-xl">Oneens</button>
            </div>
        </div>
    </div>


    <script src="resources\js\game_functions.js"></script>
</body>
</html>