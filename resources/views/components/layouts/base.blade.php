<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ secure_asset('favicon.ico') }}">
        <title>MailServer || {{ $title }}</title>
        @vite(['resources/js/app.js'])
    </head>
    <x-layouts.navbar />
    <body class="bg-white dark:bg-cyan-900">
        

        {{ $slot }}
    </body>

    </html>
</div>