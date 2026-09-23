<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultaat</title>

    <script>
        window.statistics = @json($statistics);
    </script>

    <script src="{{ asset('js/route_system.js') }}" defer></script>
</head>
<body>
    <p id="outcome"></p>
</body>
</html>