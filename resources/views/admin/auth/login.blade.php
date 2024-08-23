<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: bold;
        }
        .login-container input[type="email"], .login-container input[type="password"], .login-container button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #000;
            border-radius: 3px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .login-container input[type="email"], .login-container input[type="password"] {
            background-color: #fff;
            color: #000;
        }
        .login-container button {
            background-color: #000;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #333;
        }
        .error-message {
            background-color: #333;
            color: #fff;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #000;
            border-radius: 3px;
            text-align: left;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Admin Login</h1>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
