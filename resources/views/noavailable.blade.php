<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Center the div horizontally and vertically */
        .message {
            text-align: center;
            display: absolute;
            justify-content: center;
            align-items: center;
            margin-top: 35vh; /* Adjust as needed to center it properly */
        }
    </style>
</head>
<body>
    <div class="message">
        <h3>As of now the GalaxyPay is not available! Please contact our Customer Service Support</h3><br> <h3>Thank you</h3>
        <br>
        <button onclick="goBack()">Go Back</button>
    </div>

    <script>
        function goBack() {
            window.location.href = "https://www.fun24k.com";
        }
    </script>
</body>
</html>