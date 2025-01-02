<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1.5rem;
        }

        .action {
            margin-bottom: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .action a {
            font-weight: 600;
            text-decoration: none;
            color: #1d4ed8;
            display: flex;
            align-items: center;
            
            border-radius: 8px;
            transition: all 0.3s ease;
           
        }

        .action a:hover {
           
            transform: translateX(-2px);
        }

        .action i {
            margin-right: 10px;
        }

        .header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .header h1 {
            color: #1e40af;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #6b7280;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .destination-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .destination-name {
            color: #1e40af;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            margin-right: 10px;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            appearance: none;
        }

        .btn-primary {
            width: 100%;
            background-color: #1e40af;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #1e3a8a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Edit Destinasi dan Pemesanan</h1>
            <p>Admin dapat memperbarui harga dan jam keberangkatan</p>
        </div>
        <div class="action">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        
        <div class="destinations-grid">
            @foreach ($destinasi as $destinasi)
            <div class="destination-card">
                <div class="destination-name">{{ $destinasi->tujuan }}</div>
                <form method="POST" action="{{ route('admin.update.destinasi') }}">
                    @csrf
                    <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">
                    
                    <div class="form-group">
                        <label for="harga_{{ $destinasi->id }}">Harga Destinasi</label>
                        <input type="text" class="form-control" id="harga_{{ $destinasi->id }}" name="harga" value="{{ $destinasi->harga }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Destinasi</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>