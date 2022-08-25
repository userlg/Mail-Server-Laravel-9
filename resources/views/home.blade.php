<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Server</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="title">
        <h2>MAIL SERVER</h2>
    </div>

    <div class="container">
        <form action="/" method="POST" class='form-style'>
            @csrf
            <input type="text" class="input-style" required name="title" placeholder="Title of the email">
            <input type="email" class="input-style" required name="emailDestiny" placeholder="Destiny Email">
            <textarea class='ta-height' required name='message' placeholder='message'></textarea>
            <button class='button-style'>Send</button>
        </form>
    </div>
</body>

</html>
