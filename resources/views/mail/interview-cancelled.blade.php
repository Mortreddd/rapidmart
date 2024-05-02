<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Interview Appointment</title>
    <style>
        /* Reset CSS */
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Container Styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Content Styles */
        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Footer Styles */
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
        <!-- Header -->
        <div class="header">
            <h1 class="title">Cancelled Interview Appointment</h1>
        </div>
        <!-- Content -->
        <div class="content">
            <p class="paragraph">Dear {{ $applicantName }},</p>
            <p class="paragraph">
                We regret to inform you that your interview appointment scheduled for 
                <span style="color: #007bff;">{{ $interviewDate }}</span> at 
                <span style="color: #007bff;">{{ $interviewTime }}</span> 
                has been cancelled.
            </p>
            <p class="paragraph">Please accept our sincerest apologies for any inconvenience this may cause. We appreciate your understanding in this matter.</p>
            <p class="paragraph">If you have any questions or need further assistance, feel free to contact us.</p>
            <p class="paragraph">Thank you for your cooperation.</p>
            <p class="paragraph">Sincerely,</p>
            <p class="paragraph">HR Department</p>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>This email was sent by Rapidmart. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>
