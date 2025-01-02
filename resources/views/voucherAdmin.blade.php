<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f8ff;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .action{
                margin-bottom: 20px;
                font-size: 16px;
                display: flex;
                text-decoration-style: none;
            }

            .container a{
                font-weight: bold;
                text-decoration: none;
                color: #333;
            }

            .action i{
                margin-right: 10px;
            }

        .header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            padding: 30px;
            border-radius: 20px;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .header-list {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            padding: 20px;
            border-radius: 20px;
            color: white;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .voucher-input-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .input-field {
            flex: 1;
            padding: 15px;
            border: 2px solid #e1e5ee;
            border-radius: 10px;
            font-size: 16px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #1e3c72;
        }

        .btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .voucher-list {
            display: grid;
            gap: 20px;
        }

        .voucher-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: transform 0.3s ease;
        }

        .voucher-card:hover {
            transform: translateY(-2px);
        }

        .voucher-content {
            display: flex;
            align-items: center;
            padding: 20px;
            gap: 20px;
            background: linear-gradient(45deg, #ffffff 0%, #ffffff 50%, #f0f8ff 50%, #f0f8ff 100%);
        }

        .discount-badge {
            background: #1e3c72;
            color: white;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .discount-value {
            font-size: 24px;
            font-weight: bold;
        }

        .discount-label {
            font-size: 12px;
        }

        .voucher-details {
            flex: 1;
        }

        .voucher-id {
            font-size: 18px;
            font-weight: 600;
            color: #1e3c72;
            margin-bottom: 5px;
        }

        .validity {
            color: #666;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .validity i {
            color: #1e3c72;
        }

        .copy-btn {
            background: #e1e5ee;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            color: #1e3c72;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: #d1d5de;
        }

        .expires-soon {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff4444;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .input-group {
                flex-direction: column;
            }

            .voucher-content {
                flex-direction: column;
                text-align: center;
            }

            .discount-badge {
                margin: 0 auto;
            }

            
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Voucher Diskon</h1>
            <p>Masukkan Voucher Untuk User</p>
        </div>
        <div class="action">
            <a href="{{ url('/admin/dashboard') }}" class="">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        <form action="{{ route('voucherAdmin.store') }}" method="POST">
            @csrf
            <div class="voucher-input-section">
                <div class="input-group">
                    <input name="kode" type="text" class="input-field" placeholder="Masukkan kode voucher">
                </div>
                <div class="input-group">
                    <input name="diskon" type="text" class="input-field" placeholder="Masukkan persenan diskon">
                </div>
                <div class="input-group">
                    <input name="tanggal_berakhir" type="date" class="input-field" placeholder="Masukkan tanggal berakhir">
                </div>
                <button type="submit" class="btn">Tambah Voucher</button>
            </div>

            
        </form>
        

        <div class="voucher-list">
            <div class="header-list">
                <h1>Daftar Voucher User</h1>
            </div>
            @foreach ($voucher as $vouchers)
                <div class="voucher-card">
                    <div class="expires-soon">{{ $vouchers->tanggal_berakhir }}</div>
                    <div class="voucher-content">
                        <div class="discount-badge">
                            <span class="discount-value">{{ $vouchers->diskon }}</span>
                            <span class="discount-label">OFF</span>
                        </div>
                        <div class="voucher-details">
                            <div class="voucher-id">{{ $vouchers->kode }}</div>
                            <div class="validity">
                                <i class="far fa-clock"></i>
                                Valid sampai {{ \Carbon\Carbon::parse($vouchers->tanggal_berakhir)->translatedFormat('j F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>
</body>
</html>