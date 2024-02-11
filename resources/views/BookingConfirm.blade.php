<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation Confirmation</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  .email-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
  }
  .header {
    background-color: #4e5166;
    color: white;
    padding: 10px;
    text-align: center;
  }
  .content {
    padding: 20px;
    text-align: center;
  }
  .footer {
    padding: 10px;
    background-color: #eeeeee;
    text-align: center;
  }
  .button {
    display: inline-block;
    padding: 10px 15px;
    margin-top: 15px;
    background-color: #44c767;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
  }
</style>
</head>
<body>
  <div class="email-container">
    <div class="header">
      <h1>Tekkai Dining Reservation Confirmation</h1>
    </div>
    <div class="content">
      <p>Dear {{ $name }} {{ $surname }},</p>
      <p>We are looking forward to welcoming you on <strong>{{ $date }}</strong> at <strong>{{ $hour }}</strong>.</p>
      <a href="#" class="button">View Reservation</a>
    </div>
    <div class="footer">
      <p>Thank you for choosing Tekkai Dining.</p>
    </div>
  </div>
</body>
</html>
