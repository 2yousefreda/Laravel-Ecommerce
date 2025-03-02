<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #a586f7;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .verification-container {
      background-color: white;
      border-radius: 10px;
      padding: 40px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .icon {
      background-color: #e6e7fd;
      border-radius: 50%;
      padding: 15px;
      margin-bottom: 20px;
    }
    h2 {
      color: #333;
      font-weight: 600;
      margin-bottom: 20px;
    }
    p {
      color: #555;
      margin-bottom: 30px;
    }
    .btn-primary {
      background-color: #6dbaff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-weight: 600;
    }
    .btn-link {
      color: #6dbaff;
      margin-top: 20px;
      display: block;
      border-style: none;
      margin-left:30px; 
    }
   
  </style>
</head>
<body>

    <div class="verification-container">
      
        @if (session('status'))
            <div class="mb-4 font-medium text-sm" style="color: green; font-size: 13px;">
                {{ 'Verification link has been sent to your email.' }}
            </div>
        @endif
        <h2>Please Check Your Inbox</h2>
        <p>Dear user, in order to begin using InvoiceFlow, we need to verify your email address. A verification link has been sent to your inbox. Kindly review the email and confirm your identity.</p>
       <form method="POST" action="{{route('verification.send')}}">
        @csrf
           <button type="submit" class="btn btn-primary">Confirm</button>
           <button type="submit" class="btn-link">Didn’t receive the email? Resend</button>
       </form>
      </div>

</body>
</html>
