<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', 'Nunito', system-ui, -apple-system, sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f7f8fa; /* Tambahkan warna latar belakang */
    }

    .container-sukses {
        max-width: 800px;
        width: 650px;
        padding: 20px;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 
                    0 4px 6px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.8rem;
        font-weight: bolder;
    }

    .anim {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .text {
        text-align: center;
        
        color: #000000;
        font-size: 1.8rem;
        font-weight: bold;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
    }

    .textinfo {
        margin-left: 15px;
        margin-right: 15px;
        text-align: center;
        font-size: 1rem;
        margin-top: 15px;
    }

    .customer-name {
        color: #4077ef;
        font-weight: 600;
    }

    .back-button {
        text-align: center;
        margin-top: 20px;
    }

    .btn{
        margin-top: 20px;
        border-radius: 5px;
        flex: 1;
        background-color: #4077ef;
        text-align: center;
        margin: 0 5px;
        padding: 10px;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }
    
    .btn:hover {
        background-color: #e2e2e2;
        color: #333;
    }

    </style>
    
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <div class="container-sukses">
            <div class="header">
                <p>Yeay pembayaran berhasil!</p>
            </div>
            <div class="anim">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
<dotlottie-player src="https://lottie.host/18a87974-16af-4dbe-a716-784b7889a8dc/H93gdzA3ZZ.lottie" background="" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
            </div>
            <div class="text">
                <p>Selamat Berlibur <span class="customer-name">{{ $pemesanan->nama_lengkap }}</span></p>
            </div>
            <div class="textinfo">
                <p>ID pesanan anda <span class="customer-name"><b>{{ $pemesanan->id }}</b></span>, dengan Total Pembayaran <span class="customer-name"><b>IDR {{ number_format($pemesanan->total_pembayaran, 0, ',', '.') }}</b></span></p>
                <p></p>
            </div>
            <div class="back-button">
                <a href="{{ route('pemesanan.home', ['id' => $pemesanan->id]) }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
            
        
    </div>
</body>
</html>
        
        