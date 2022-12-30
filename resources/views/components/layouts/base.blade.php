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

    <body>
         <x-layouts.navbar />

        {{ $slot }}
    </body>

    </html>
</div>
