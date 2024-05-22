<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Rejection</title>
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

        /* Title Styles */
        .title {
            color: #333333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Paragraph Styles */
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
        <div class="content">
            <p class="paragraph">Dear {{ $applicantName }},</</p>
            <p class="paragraph">
            <p class="paragraph">We regret to inform you that after careful consideration, we have decided not to move forward with your application for the {{ $positionName }} at Rapidmart.</p>
            <p class="paragraph">We received a large number of applications, and while we appreciate the time and effort you put into your application, we have selected candidates whose qualifications more closely match the needs of the role.</p>
            <p class="paragraph">We want to thank you for your interest in joining our team and wish you all the best in your job search.</p>
            <p class="paragraph">Sincerely, HR Department</p>
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>
