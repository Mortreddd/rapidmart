<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Rejection</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full text-center">
        <h1 class="text-2xl font-semibold mb-4">Application Rejected</h1>
        <p class="text-gray-600 mb-4">Dear {{ $applicantName }},</p>
        <p class="text-gray-600 mb-4">We regret to inform you that your application for the {{ $positionName }} position has been rejected.</p>
        <p class="text-gray-600 mb-4">We appreciate your interest in joining our team and wish you the best in your job search.</p>
        <p class="text-gray-600">Sincerely,</p>
        <p class="text-gray-600">RapidMart</p>
    </div>
</body>
</html>