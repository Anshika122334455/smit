<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Under Construction</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .container {
            text-align: center;
            max-width: 500px;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-top: 6px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 25px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .contact {
            font-size: 14px;
            opacity: 0.85;
        }

        .contact a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="loader"></div>
        <h1>We’re Working On It</h1>
        <p>Our website is currently under construction.  
           We’ll be launching something amazing very soon.</p>

      
    </div>

</body>
</html>
