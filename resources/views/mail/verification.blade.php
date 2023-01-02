<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Code</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body
    style="background-color: white; padding: 12px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap:5px;">

    <div style="margin: auto; border: 1px solid #BE185D; padding: 5px; width: 60%;">
        <h3 style="color: #BE185D; font-family: 'Bangers', cursive; letter-spacing: 0.1rem; text-align: center">
            {{ $data['message'] }}</h3>

        <p style="font-weight: 900; text-align: center; color: black; font-size: 20px;">{{ $data['code'] }}</p>
    </div>

</body>

</html>
