<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
        }
        .details {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tiket Pemesanan</h1>
        <p>Terima kasih telah menggunakan layanan kami!</p>
    </div>
    <div class="details">
        <p><strong>ID Pemesanan:</strong> {{ $pemesanan->id }}</p>
        <p><strong>Nama Pemesan:</strong> {{ $pemesanan->nama_lengkap }}</p>
        <p><strong>Jenis Kendaraan:</strong> {{ $pemesanan->jenis_kendaraan }}</p>
        <p><strong>Destinasi:</strong> {{ $pemesanan->destinasi->tujuan }}</p>
        <p><strong>Tanggal:</strong> {{ $pemesanan->tanggal }}</p>
        <p><strong>Waktu:</strong> {{ $pemesanan->jam }}</p>
        <p><strong>Kursi Dipilih:</strong> {{ $pemesanan->kursi_dipilih }}</p>
        <span class="total-price"><strong>Total Pembayaran</strong> IDR {{ number_format($pemesanan->total_pembayaran, 0, ',', '.') }}</span>
        <p><strong>Status Pembayaran:</strong> {{ $pemesanan->status_pembayaran }}</p>
    </div>
    <div class="footer">
        <p>Selamat menikmati perjalanan Anda!</p>
    </div>
</body>
</html>
