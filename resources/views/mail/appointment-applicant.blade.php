<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Invitation</title>
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
            <h1 class="title">Rescheduled Interview Appointment</h1>
        </div>
        <div class="content">
            <p class="paragraph">Dear {{ $applicantName }},</p>
            <p class="paragraph">Thank you for applying to Rapidmart.</p>
            <p class="paragraph">
                Your application for the {{ $positionName }} position stood 
                out to us and we would like to invite you for an interview at our 
                office to get to know you a bit better.
            </p>
            <p class="paragraph">Your interview details are as follows:</p>
            <ul class="paragraph" style="list-style-type: none;">
                <li><strong>Date:</strong> <span style="color: #007bff;">{{ $appointmentDate }}</span></li>
                <li><strong>Time:</strong> <span style="color: #007bff;">{{ $appointmentTime }}</span></li>
            </ul>
            <p class="paragraph">
                The interview will last about 10 minutes 
                and you'll have the chance to discuss 
                the {{ $positionName }} position
                and learn more about our company.
            </p>
           
            <p class="paragraph">Looking forward to hearing from you.</p>
            <p class="paragraph">Thank you for your cooperation.</p>
            <p class="paragraph">All the best regards, HR Department</p>
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>
