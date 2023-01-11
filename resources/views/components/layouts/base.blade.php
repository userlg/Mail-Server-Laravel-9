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

    <body class="bg-white dark:bg-cyan-900">

        <div id="container-loader" class="mx-auto">
            <div id="loading_container">
                <div id="loading"></div>
            </div>
        </div>

        <x-layouts.navbar />

        @if (session('status'))
        <div class="w-11/12 lg:w-1/2 animate-fade-in-down border border-pink-700 bg-gray-50 shadow-md dark:shadow-none shadow-gray-500  dark:bg-pink-700 dark:border-pink-800 dark:text-white transition-all duration-300 ease-linear rounded-sm mt-10 mx-auto p-3 flex flex-col items-center justify-center" id="status">
           <p class="text-sm sm:text-base text-justify"> {{ session('status') }} </p>
        </div>
        @endif

        {{ $slot }}
    </body>

    </html>
</div>
