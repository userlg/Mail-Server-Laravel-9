<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>Mail Server</title>
    @vite(['resources/js/app.js'])
</head>

<body>

    <div class="title mb-8">
        <h2>MAIL SERVER</h2>
    </div>

    <div class="container">
        <form action="/" method="POST" class="flex flex-col gap-4 w-full justify-center items-center">
            @csrf
            <input type="text" class="w-11/12 h-12 border-2 border-sky-600 rounded-sm" required name="title"
                placeholder="Title of the email">

            <input type="email" class="w-11/12 h-12 border-2 border-sky-600 rounded-sm" required name="senderEmail"
                placeholder="Your email">

            <textarea class="w-11/12 border-2 border-sky-600 h-1/2 rounded-sm" required name='message' placeholder='message'></textarea>

            <button
                class="text-sm sm:text-md text-white bg-purple-700 w-1/3 p-2 rounded-md hover:bg-purple-900 transition-all ease-linear duration-300">Send</button>
        </form>
    </div>

    @if (session('status'))
        <strong>{{ session('status') }}</strong>
    @else
        <strong class="text-sm sm:text-2xl strong">Welcome send your message to the admin</strong>
    @endif
</body>

</html>
