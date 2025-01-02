<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fontawesome.com/v6.0/icons?d=gallery&p=2" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .action {
            margin-bottom: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .container a {
            font-weight: 600;
            text-decoration: none;
            color: #1d4ed8;
            display: flex;
            align-items: center;
            
            border-radius: 8px;
            transition: all 0.3s ease;
           
        }

        .container a:hover {
           
            transform: translateX(-2px);
        }

        .action i {
            margin-right: 10px;
        }

        .header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            padding: 40px;
            border-radius: 24px;
            color: white;
            margin-bottom: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .header-list {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            padding: 25px;
            border-radius: 20px;
            color: white;
            margin: 30px 0;
            text-align: center;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .voucher-input-section {
            background: white;
            border-radius: 24px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .input-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .input-field {
            flex: 1;
            padding: 18px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .input-field:focus {
            outline: none;
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .voucher-input-section label {
            font-size: 18px;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 12px;
            display: block;
        }

        .btn {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 18px 30px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.25);
        }

        .voucher-list {
            display: grid;
            gap: 25px;
        }

        .voucher-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            position: relative;
            transition: transform 0.3s ease;
        }

        .voucher-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .voucher-content {
            display: flex;
            align-items: center;
            padding: 30px;
            gap: 25px;
            background: linear-gradient(45deg, #ffffff 0%, #ffffff 50%, #f0f7ff 50%, #f0f7ff 100%);
        }

        .discount-badge {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 16px;
            flex-shrink: 0;
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.25);
        }

        .discount-value {
            font-size: 28px;
            font-weight: 700;
        }

        .discount-label {
            font-size: 14px;
            opacity: 0.9;
        }

        .voucher-details {
            flex: 1;
        }

        .voucher-id {
            font-size: 20px;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 8px;
        }

        .validity {
            color: #64748b;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .validity i {
            color: #2563eb;
        }

        .expires-soon {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        .btn-claim {
            width: 100%;
            padding: 15px;
            background: #2563eb;
            color: white;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-claim:hover {
            background: #1d4ed8;
        }

        .btn-clear-session {
            width: 100%;
            padding: 12px;
            background: #ef4444;
            color: white;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-clear-session:hover {
            background: #dc2626;
        }

        @media (max-width: 600px) {
            .input-group {
                flex-direction: column;
            }

            .voucher-content {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .discount-badge {
                margin: 0 auto;
            }

            .header {
                padding: 30px 20px;
            }

            .voucher-input-section {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Voucher Diskon</h1>
            <p>Gunakan voucher untuk mendapatkan harga spesial</p>
        </div>
        <div class="action">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        <form action="{{ route('voucherUser.store') }}" method="POST">
            @csrf
            <div class="voucher-input-section">
                <label for="">Masukkan Kode Voucher</label>
                <div class="input-group">
                    <input name="kode" type="text" class="input-field" placeholder="Masukkan kode voucher">
                </div>
                <button type="submit" class="btn">Tambah Voucher</button>
            </div>
        </form>

        <div class="voucher-list">
            <div class="header-list">
                <h1>Daftar Voucher User</h1>
            </div>
            
            @foreach (session('user_vouchers', []) as $voucher)
                @if ($voucher->tanggal_berakhir >= now())
                <form action="{{ route('voucher.claim') }}" method="POST">
                    @csrf
                    <div class="voucher-card">
                        <div class="expires-soon">{{ $voucher->tanggal_berakhir }}</div>
                        <div class="voucher-content">
                            <div class="discount-badge">
                                <span class="discount-value">{{ $voucher->diskon }}</span>
                                <span class="discount-label">OFF</span>
                            </div>
                            <div class="voucher-details">
                                <div class="voucher-id">{{ $voucher->kode }}</div>
                                <div class="validity">
                                    <i class="far fa-clock"></i>
                                    Valid sampai {{ \Carbon\Carbon::parse($voucher->tanggal_berakhir)->translatedFormat('j F Y') }}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="kode_voucher" value="{{ $voucher->kode }}">
                        <button type="submit" class="btn-claim">Klaim Voucher</button>
                    </div>
                </form>
                <form action="{{ route('voucher.clearSession') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-clear-session">Hapus Semua Voucher</button>
                </form>
                @endif
            @endforeach
        </div>
    </div>
</body>
</html>