<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Admin layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
    <div class="container">
        {{ $slot }}
    </div>
</body>

</html>
