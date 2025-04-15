<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .register-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: white;
            text-align: center;
        }

        .register-container label {
            display: block;
            text-align: left;
            margin-left: 20%;
            font-weight: bold;
            padding-top: 10px;
        }

        .register-container input {
            width: 60%;
            padding: 10px;
            margin: 5px auto;
            border: 1px solid #000;
            border-radius: 5px;
            display: block;
        }

        .register-container button {
            background-color: #198754;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .register-container a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <input type="hidden" name="role" value="user">

            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}">Already have an account? <strong>Login</strong></a>
    </div>
</body>
</html>
