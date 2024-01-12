<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="flex flex-col min-h-screen space-y-4">
    <nav>
        <x-navigation/>
    </nav>
    <main class="flex-grow">
        {{$slot}}
    </main>
    <footer>
        <x-footer/>
    </footer>
    @livewireScripts
</body>
</html>