
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Rejection</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .footer {
        text-align: center;
        margin-top: 30px;
    }
</style>
</head>
<body>
<div class="container">

    <div class="message">
        <p>Dear {{ $applicantName }},</p>
        <p>Thank you for applying to Rapidmart,</p>
        <p>
            Your application for the {{ $positionName }} position stood 
            out to us and we would like to invite you for an interview at our 
            office to get to know you a bit better.
        </p>
        <p>
            The interview will last about 10 minutes and you'll have the chance to discuss the {{ $positionName }} position
            and learn more about our company.
        </p>
        <p>
            would you be available on {{ $appointmentDate }}?
        </p>
        <p>
            Looking forward to hearing from you.
        </p>
        <p>All the best regards, HR Department</p>
    </div>
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
    </div>
</div>
</body>
</html>
