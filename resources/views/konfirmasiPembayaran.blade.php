<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Pesanan</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
        }

        .order-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 30px;
            position: relative;
        }

        .order-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .order-header p {
            opacity: 0.9;
            font-size: 16px;
        }

        .order-content {
            padding: 30px;
        }

        .info-group {
            margin-bottom: 25px;
            border-bottom: 1px solid #e1e5ee;
            padding-bottom: 20px;
        }

        .info-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .info-label {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .info-value {
            color: #1e3c72;
            font-size: 18px;
            font-weight: 600;
        }

        .destination-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .price-details {
            background: #f8faff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .price-row:last-child {
            margin-bottom: 0;
            padding-top: 10px;
            border-top: 1px dashed #ccc;
        }

        .total-price {
            font-size: 20px;
            font-weight: 700;
            color: #1e3c72;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 30px;
        }

        

        

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-back {
            background: #e1e5ee;
            color: #1e3c72;
        }

        .btn-back:hover {
            background: #d1d5de;
        }

        .btn-pay {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-edit {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #b11e1e, #dc2626);
            color: white;
            align-items: center;
            padding: 15px 41%;
            display: flex;
            transition: all 0.3s ease;
            justify-content: center;
            gap: 8px;


        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-group a {
            text-decoration: none;
        }

        .status {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
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

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .order-content {
                padding: 20px;
            }

            .button-group {
                grid-template-columns: 1fr;
            }
        }

        .detail-icon {
            color: #1e3c72;
            width: 30px;
            text-align: center;
            margin-right: 10px;
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info-content {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-card">
            <div class="order-header">
                <h1>Rincian Pesanan</h1>
                <p>Order ID: {{ $pemesanan->id }}</p>
                <div class="status {{ $pemesanan->status_pembayaran }}">{{ $pemesanan->status_pembayaran }}</div>
            </div>
            
            <div class="order-content">
                <img src="{{ $destinasi->image }}" alt="Destination" class="destination-image">
                
                <div class="info-group">
                    <div class="info-row">
                        <div class="detail-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Nama Pemesan</div>
                            <div class="info-value">{{ $pemesanan->nama_lengkap }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Tujuan Wisata</div>
                            <div class="info-value">
                                {{ $destinasi->tujuan }}
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="detail-icon">
                            <i class="fa-solid fa-car"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Kursi</div>
                            <div class="info-value">{{ $pemesanan->kursi_dipilih }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="detail-icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Tanggal Keberangkatan</div>
                            <div class="info-value">{{ $pemesanan->tanggal }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Jam Keberangkatan</div>
                            <div class="info-value">{{ $pemesanan->jam }}</div>
                        </div>
                    </div>
                </div>

                <div class="price-details">
                    <div class="price-row">
                        <span>Harga Tiket</span>
                        <span>{{ $destinasi->harga }}</span>
                    </div>
                    <div class="price-row">
                        <span>Total Pembayaran</span>
                        <span class="total-price">IDR {{ number_format($pemesanan->total_pembayaran, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="button-group">
                    <a class="btn btn-back" href="{{ url('/') }}">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Home
                    </a>
                    
                    <a class="btn btn-pay" href="{{ route('pembayaran.success', ['id' => $pemesanan->id]) }}">
                        <i class="fas fa-wallet"></i>
                        Bayar Sekarang
                    </a>
                    
                    <a class="btn btn-edit" href="{{ route('pemesanan.edit', ['id' => $pemesanan->id]) }}">
                        <i class="fas fa-edit"></i>
                        Edit Pesanan
                    </a>
                    <div class="">
                        <form action="{{ route('pemesanan.cancel', $pemesanan->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-cancel" >
                                <i class="fa-solid fa-xmark"></i>
                                Cancel
                            </button>
                        </form>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>