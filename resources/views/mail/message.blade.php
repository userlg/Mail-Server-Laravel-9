<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notify Message</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body
    style="background-color: #164E63; padding: 12px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap:5px">
    <div style="margin: auto; border: 1px solid #BE185D; padding: 5px; width: 60%; background-color: white;">
        <div
            style="margin: auto; display: felx; flex-direction: column; align-items: center; justify-content: center; padding: 5px; gap: 10px;">
            <div
                style="display: flex; margin: auto; flex-direction: row; justify-content: center; align-items: center; padding: 2px;">
                <img src="https://i.imgur.com/4BELzPD.png" alt=""
                    style="width: 150px; height: 150px; margin: auto; border-radius: 7px;">
            </div>
            <h4 style="text-align: center; color: #BE185D; font-size: 18px;">From: {{ $data['senderEmail'] }}</h4>
            <p style="text-align: center; font-weight: 700; font-size: 18px;">Ip: {{ $data['ip'] }}</p>
            <p style="text-align: center; font-weight: 500; font-size: 16px;">{{ $data['message'] }}</p>
        </div>
    </div>

</body>

</html>
