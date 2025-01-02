<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .order-card {
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .order-card:hover {
            transform: translateY(-2px);
        }

        .destination {
            color: #1e3c72;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .order-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .label {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .value {
            color: #333;
            font-weight: 500;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .status.paid {
            background-color: #e7f7ee;
            color: #1f9254;
        }

        .status.pending {
            background-color: #fff8e6;
            color: #b7791f;
        }

        .status.cancelled {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-print {
            background-color: #1e3c72;
            color: white;
        }

        .btn-print:hover {
            background-color: #2a5298;
        }

        .btn-pay {
            background-color: #2563eb;
            color: white;
        }

        .btn-pay:hover {
            background-color: #1d4ed8;
        }

        .btn-edit {
            background-color: #f3f4f6;
            color: #374151;
        }

        .btn-edit:hover {
            background-color: #e5e7eb;
        }

        .btn-trash {
            background-color: #f3f4f6;
            color: #374151;
        }

        .btn-trash {
            background-color: #e5e7eb;
        }

        .actions a {
            text-decoration: none;
            
        }

        .action a {
            text-decoration: none;   
        }

        .action a i {
            font-size: 16px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Riwayat Pemesanan</h1>
            <p>Kelola semua pesanan wisata Anda di sini</p>
            
        </div>
        <div class="action">
            <a href="{{ url('/') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        @foreach ($pemesanan as $pemesanan) 
        <div class="order-card">
            <div class="destination">{{ $pemesanan->destinasi->tujuan }}</div>
            <div class="order-details">
                <div class="detail-item">
                    <span class="label">Nama Pemesan</span>
                    <span class="value">{{ $pemesanan->nama_lengkap }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Kursi</span>
                    <span class="value">{{ $pemesanan->kursi_dipilih }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Total Harga</span>
                    <span class="value">Rp {{ number_format($pemesanan->total_pembayaran, 0, ',', '.') }}</span>
                </div>
            </div>
            <span class="status {{ $pemesanan->status_pembayaran }}">{{ $pemesanan->status_pembayaran }}</span>
            <div class="actions">
                @if ($pemesanan->status_pembayaran == 'pending')
                    <a href="{{ route('konfirmasi.pembayaran', ['id' => $pemesanan->id]) }}" class="btn btn-pay">
                        <i class="fas fa-wallet"></i>
                        Bayar Tiket
                    </a>
                    <a href="{{ route('pemesanan.edit', ['id' => $pemesanan->id]) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i>
                        Edit Pesanan
                    </a>
                    <a href="{{ route('konfirmasi.pembayaran', ['id' => $pemesanan->id]) }}" class="btn btn-edit">
                        <i class="fa-solid fa-circle-info"></i>
                        Detail Pesanan
                    </a>
                @elseif ($pemesanan->status_pembayaran == 'cancelled')
                <form action="{{ route('pemesanan.trash', $pemesanan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-trash">
                        <i class="fas fa-trash"></i>
                        Hapus Riwayat
                    </button>
                </form>
                    
                @elseif ($pemesanan->status_pembayaran == 'paid')
                    <a href="" class="btn btn-print">
                        <i class="fas fa-print"></i>
                        Cetak Tiket
                    </a>
                @endif
            </div>
        </div>
            
        @endforeach
    </div>
</body>
</html>