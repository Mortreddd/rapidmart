

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666666;
            font-size: 14px;
        }
        .title {
            color: #333333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }
        .btn:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .paragraph {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .btn-container{
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Forgot Password</h1>
        </div>
        <div class="content">
            <p class="paragraph">Dear Mr/Mrs,</p>
            <p class="paragraph">We received a request to reset your password. Click the button below to reset it:</p>
            
            <div class="btn-container">
                <a href="{{ route('reset-password.index', ['email' => $email, 'token' => $token]) }}" class="btn">Reset Password</a>
            </div>
        </div>
        <div class="footer">
            <p>
                If you didn't request a password reset, you can safely ignore this email. 
                This email was sent by Rapidmart. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>

</html>
