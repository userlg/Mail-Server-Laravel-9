<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Server</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div>
        <form action="/" method="POST"></form>
        <input type="text" required name="title" placeholder="Title of the email">
        <input type="email" required name="emailDestiny" placeholder="Destiny Email">
        <input type="text" required name="message" placeholder="message">
        <button>Send</button>
    </div>
</body>

</html>
