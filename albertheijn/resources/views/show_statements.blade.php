<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellingen & Antwoorden</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>

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
    <div class="h-screen flex items-center justify-center">
        <main class="flex flex-col items-center text-center gap-5">
            <h1 id="statement" class="p-5 border-2 border-black rounded-2xl"></h1>
            <p id="context" class="p-5 border-2 border-black rounded-2xl"></p>
            <form id="answer-form" class="flex flex-col gap-5">
                <div class="flex gap-5">

                    <button type="submit" name="answer" value="0" id="answer-1" 
                    class="inline-flex w-auto items-center justify-between rounded-2xl px-6 py-5 text-lg bg-[#3b5f5b] 
                    border-2 border-[#283d3b] text-[#EADED6] font-bold transition hover:bg-[#283d3b] hover:text-[#EADED6] 
                    active:scale-[0.98]">Eens</button>

                    <button type="submit" name="answer" value="1" id="answer-2" 
                    class="inline-flex w-auto items-center justify-between rounded-2xl px-6 py-5 text-lg bg-[#3b5f5b]   
                    border-2 border-[#283d3b] text-[#EADED6] font-bold transition hover:bg-[#283d3b] hover:text-[#EADED6] 
                    active:scale-[0.98]">Oneens</button>

                </div>

                <div>

                    <label for="uitleg" class="flex flex-col">Extra uitleg</label>
                    <textarea type="text" name="uitleg" id="uitleg" class="bg-white border-2 rounded-2xl px-5 border-[#3b5f5b]  text-black"></textarea>

                </div>
            </form>
        </main>
    </div>
</body>
</html>