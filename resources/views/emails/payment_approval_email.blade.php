<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
<div class="container" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <!-- Logo Section -->
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="https://www.sub.ac.bd/uploads/logo/cdcbff91d69b664eef72.jpg" alt="Logo" style="max-width: 100%; height: auto;">
    </div>

    <p>Dear {{$content['name']}},</p>
    <p>We have received your payment. Please wait for the Admin approval email.</p>
    <br>

    <p>Thank you</p>
    <p>Sincerely,</p>
    <p>SUB</p>
</div>
</body>

</html>
