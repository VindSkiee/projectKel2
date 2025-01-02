<!DOCTYPE html>
<html>
<head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', system-ui, sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .container {
        background: white;
        padding: 2.5rem;
        border-radius: 24px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #1e40af;
        margin-bottom: 1.5rem;
        font-size: 1.75rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #4b5563;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .btn-primary {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    @media (max-width: 480px) {
        .container {
            padding: 1.5rem;
        }
    }

    /* Alert styles for success/error messages */
    .alert {
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        text-align: center;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
    }

    .alert-error {
        background: #fee2e2;
        color: #dc2626;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Lupa Password?</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <input type="email" class="form-control" name="recipient_email" placeholder="Recipient Email" required>
            </div>
            <button type="submit" class="btn-primary">Kirim Link Reset Password</button>
        </form>
    </div>
</body>
</html>