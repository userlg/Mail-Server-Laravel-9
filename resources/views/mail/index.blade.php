<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notify</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <strong>From: {{ $data['senderEmail'] }}</strong>

    <h2 class="text-green-900 font-bold">Ip: {{ $data['ip'] }}</h2>

    <p class='message-style'>{{ $data['message'] }}</p>


</body>

</html>
