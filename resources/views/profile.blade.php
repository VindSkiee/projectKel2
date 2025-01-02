<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: white;
            color: #2563eb;
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-link i {
            margin-right: 0.5rem;
        }

        .back-link:hover {
            transform: translateX(-4px);
            background: #f8fafc;
        }

        .profile-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            padding: 3rem 2rem;
            text-align: center;
            color: white;
        }

        .profile-image-container {
            width: 150px;
            height: 150px;
            margin: 0 auto 1.5rem;
            position: relative;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid white;
            overflow: hidden;
            position: relative;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .image-upload-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.5rem;
            font-size: 0.875rem;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
            text-align: center;
        }

        .profile-image:hover .image-upload-label {
            opacity: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            opacity: 0.9;
        }

        .profile-body {
            padding: 2rem;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .section-title {
            color: #1e40af;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4b5563;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .btn {
            width: 100%;
            padding: 0.875rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #1e40af;
        }

        .btn-danger {
            background: #fee2e2;
            color: #dc2626;
            margin-top: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #dc2626;
        }

        #image-upload {
            display: none;
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .profile-card {
                border-radius: 16px;
            }

            .profile-header {
                padding: 2rem 1rem;
            }

            .profile-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-image-container">
                    <div class="profile-image">
                        @if(Auth::user()->profile_image)
                            <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="Profile" id="preview-image">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default" id="preview-image">
                        @endif
                        <label for="image-upload" class="image-upload-label">
                            <i class="fas fa-camera"></i> Ubah Foto
                        </label>
                    </div>
                </div>
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-email">{{ Auth::user()->email }}</div>
            </div>

            <div class="profile-body">
                <form action="{{ route('profile.update.image') }}" method="POST" enctype="multipart/form-data" id="image-form">
                    @csrf
                    <input type="file" id="image-upload" name="profile_image" accept="image/*">
                </form>

                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>
                        Informasi Pribadi
                    </h3>
                    <form action="{{ route('profile.update.name') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                    </form>
                </div>

                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-lock"></i>
                        Keamanan
                    </h3>
                    <form action="{{ route('profile.update.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-key"></i>
                            Perbarui Password
                        </button>
                    </form>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Handle image upload and preview
        document.getElementById('image-upload').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    document.getElementById('preview-image').src = event.target.result;
                }
                
                reader.readAsDataURL(e.target.files[0]);
                document.getElementById('image-form').submit();
            }
        });
    </script>
</body>
</html>