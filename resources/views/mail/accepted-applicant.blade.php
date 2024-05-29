<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceptance Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #2A42C0;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
        }
        .content .highlight {
            font-weight: bold;
            color: #2A42C0;
        }
        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #2A42C0;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }
        .button:hover {
            background-color: #1e38ba;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Congratulations!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $employee->last_name }}, {{ $employee->first_name}}</p>
            <p>Your official start date will be <span class="highlight">{{ $startDate }}</span>. Please ensure you complete all required preparations before this date.</p>
            <p>Please review the attached documents for further information on the next steps. If you have any questions, feel free to contact our admissions office.</p>
            <p>We look forward to welcoming you to our campus!</p>
            <p>Best regards,</p>
            <p>{{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}<br>{{ Auth::user()->position->name }}<br>Rapidmart</p>
            @if ($isAuthorized)
                <a href="" class="button">View Next Steps</a>
            @endif
        </div>
        <div class="footer">
            <p>&copy;2024 Rapidmart. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
