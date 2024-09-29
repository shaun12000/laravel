<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>405 Method Not Allowed</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 50px;
            color: #dc3545; /* Bootstrap danger color */
        }
        h2 {
            font-size: 24px;
            margin: 20px 0;
        }
        p {
            font-size: 16px;
            margin: 20px 0;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3; /* Darker shade of primary color */
        }
    </style>
</head>
<body>
    <h1>405</h1>
    <h2>Method Not Allowed</h2>
    <p>The requested method is not allowed for this endpoint.</p>
    <p>Please check the URL or return to the <a href="{{ route('dashboard') }}">dashboard</a>.</p>
</body>
</html>