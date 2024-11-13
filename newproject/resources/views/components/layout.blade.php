<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Home</title>
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <head>
        <!-- Tambahkan link Google Fonts untuk Inter dan Merriweather -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <head>
        <!-- FontAwesome CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    

</head>
<body>
    @include('components.navbar')
    @include('components.header')
    <div class="my-10 mx-20">
        @yield('content')
    </div>

</body>
</html>