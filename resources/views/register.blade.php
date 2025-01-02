<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: #1e3c72;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #1e3c72;
        }

        .form-control {
            width: 100%;
            padding:  10px 12px 10px;
            border: 2px solid #e1e5ee;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #1e3c72;
            box-shadow: 0 0 0 3px rgba(30, 60, 114, 0.1);
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #1e3c72;
            font-weight: 500;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .forgot-password {
            color: #1e3c72;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #2a5298;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .signup-link {
            color: #1e3c72;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link:hover {
            color: #2a5298;
        }

        .social-login {
            margin-top: 1.5rem;
            text-align: center;
        }

        .social-login p {
            color: #666;
            margin-bottom: 1rem;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #e1e5ee;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .error-list {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }

        .error-list ul {
            margin: 0;
            padding-left: 1.5rem;
            color: #dc2626;
            list-style: none;
        }

        
        
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Buat Akun</h1>
        </div>
        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama</label>
                
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                
                <input type="email" name="email" class="form-control"  placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="form-group">
                
                
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
            </div>

            <button type="submit" class="login-button">Daftar</button>
            <div class="login-footer">
                <p>Sudah punya akun? <a href="{{ route('login') }}" class="signup-link">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>