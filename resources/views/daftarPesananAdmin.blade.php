<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .orders-container {
            padding: 2rem;
            background: #f8fafc;
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

        .orders-header {
            color: #1e40af;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .orders-table {
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-collapse: collapse;
            overflow: hidden;
        }

        .orders-table th {
            background: #1e40af;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 500;
        }

        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
        }

        .orders-table tr:hover {
            background: #f1f5f9;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
        }

        .status-paid {
            background: #dcfce7;
            color: #166534;
        }

        .status-unpaid {
            background: #fee2e2;
            color: #991b1b;
        }

        .order-amount {
            font-family: monospace;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="orders-container">
        <h1 class="orders-header">Daftar Pesanan</h1>
        <div class="action">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
        
        <table class="orders-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>Tujuan Wisata</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->nama_lengkap }}</td>
                    <td>{{ $order->destinasi->tujuan }}</td>
                    <td class="order-amount">Rp {{ number_format($order->total_pembayaran, 0, ',', '.') }}</td>
                    <td>
                        <span class="status-badge {{ $order->status_pembayaran == 'paid' ? 'status-paid' : 'status-unpaid' }}">
                            {{ $order->status_pembayaran == 'paid' ? 'Lunas' : 'Belum Lunas' }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_pesanan)->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>