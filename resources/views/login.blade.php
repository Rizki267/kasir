<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
   <style>
    body {
      background: #00189e;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-form {
      background: #00aeff;
      padding: 2rem 2.5rem;
      border-radius: 8px;
      box-shadow: 0 6px 24px rgba(25, 125, 255, 0.12);
      min-width: 320px;
    }
  </style>
</head>
<body>
  <form class="login-form">
    <h2 class="mb-4 text-center">Login</h2>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Enter your username" >
    </div>
    <div class="mb-4">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter your password" >
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
</body>
</html>
