<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #0c0c0c;
        }
        .container {
            text-align: center;
        }
        .container h1 {
            font-size: 5rem;
            color: #ffc107;
        }
        .container p {
            font-size: 1.5rem;
        }
        strong{
            font-size: 40px !important;
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <p><strong>403</strong> Waduh!!! - Sepertinya Kamu Tersesat. <a href="{{ url()->previous() }}">Kembali</a></p>

    </div>
</body>
</html>
