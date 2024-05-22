
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescheduled Interview Appointment</title>
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

        .paragraph {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Termination Notification</h1>
        </div>
        <div class="content">
            <p class="paragraph">Dear {{ $employee->last_name }},</p>
            <p class="paragraph">We regret to inform you that your employment with Rapidmart has been terminated.</p>
            <p class="paragraph">This decision is based on [reasons for termination].</p>
            <ul class="paragraph" style="list-style-type: none;">
                <li>Your last working day will be <strong> <span style="color: #007bff;">{{ $terminationDate }}</span></strong></li>
            </ul>
            <p class="paragraph">Please make sure to return any company property in your possession before your departure.</p>
            <p class="paragraph">
                If you have any questions or need further clarification, please don't hesitate to contact 
                {{ $terminator->first_name }}, {{ $terminator->last_name }} at {{ $terminator->email }} 
                or {{ $employee->phone }}
            </p>
            <p class="paragraph">Sincerely, Rapidmart</p>
        </div>
        <div class="footer">
            <p>This email was sent by Rapidmart. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>
