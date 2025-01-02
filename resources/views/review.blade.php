<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Pesanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', 'Segoe UI', sans-serif;
}

body {
    background: linear-gradient(135deg, #e6f0ff, #f8fbff);
    min-height: 100vh;
    padding: 30px 20px;
}

.container {
    max-width: 900px;
    margin: 0 auto;
}

.container a {
            font-weight: 600;
            text-decoration: none;
            color: #2563eb;
            display: flex;
            align-items: center;
            
            border-radius: 8px;
            transition: all 0.3s ease;
           margin-bottom: 20px;
        }

        .container a:hover {
           
            transform: translateX(-2px);
        }

        .action i {
            margin-right: 10px;
        }

.header {
    background: linear-gradient(135deg, #0052cc, #1a75ff);
    padding: 40px 30px;
    border-radius: 24px;
    color: white;
    margin-bottom: 30px;
    text-align: center;
    box-shadow: 0 10px 20px rgba(26, 117, 255, 0.15);
}

.header h1 {
    font-size: 28px;
    margin-bottom: 12px;
    font-weight: 700;
}

.header p {
    font-size: 16px;
    opacity: 0.9;
}

.review-section {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    padding: 35px;
    margin-bottom: 30px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.review-section h2 {
    color: #0052cc;
    margin-bottom: 25px;
    font-size: 22px;
    font-weight: 600;
}

.booking-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-bottom: 30px;
    padding-bottom: 30px;
    border-bottom: 2px solid #e6f0ff;
}

.info-item {
    display: flex;
    flex-direction: column;
    background: #f8fbff;
    padding: 20px;
    border-radius: 16px;
    transition: transform 0.3s ease;
}

.info-item:hover {
    transform: translateY(-3px);
}

.info-label {
    color: #4d4d4d;
    font-size: 14px;
    margin-bottom: 8px;
    font-weight: 500;
}

.info-value {
    color: #0052cc;
    font-weight: 600;
    font-size: 16px;
}

.rating {
    text-align: center;
    margin: 30px 0;
}

.stars {
    font-size: 32px;
    color: #e6e6e6;
    cursor: pointer;
    transition: color 0.3s ease;
}

.stars:hover {
    color: #ffd700;
}

.stars.selected {
    color: #ffd700;
}

.fa-star {
    margin: 0 3px;
    transition: transform 0.2s ease;
}

.fa-star:hover {
    transform: scale(1.1);
}

.fa-star.active,
.fa-star.selected {
    color: #ffd700;
}

.review-form textarea {
    width: 100%;
    padding: 20px;
    border: 2px solid #e6f0ff;
    border-radius: 16px;
    resize: vertical;
    min-height: 150px;
    margin: 25px 0;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8fbff;
}

.review-form textarea:focus {
    outline: none;
    border-color: #1a75ff;
    box-shadow: 0 0 0 4px rgba(26, 117, 255, 0.1);
}

.btn {
    padding: 14px 28px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-submit {
    background: linear-gradient(135deg, #0052cc, #1a75ff);
    color: white;
    box-shadow: 0 4px 15px rgba(26, 117, 255, 0.2);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(26, 117, 255, 0.3);
}

.review-history {
    margin-top: 50px;
}

.review-history h2 {
    color: #0052cc;
    margin-bottom: 25px;
    font-size: 22px;
    font-weight: 600;
}

.review-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #e6f0ff;
}

.review-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.reviewer-info {
    display: flex;
    align-items: center;
    gap: 18px;
}

.reviewer-name {
    font-weight: 600;
    color: #0052cc;
    font-size: 16px;
}

.review-date {
    color: #666;
    font-size: 14px;
}

.review-rating {
    color: #ffd700;
    font-size: 20px;
    margin: 15px 0;
}

.review-text {
    color: #4d4d4d;
    line-height: 1.7;
    font-size: 15px;
}

.empty-state {
    text-align: center;
    padding: 50px 20px;
    color: #666;
}

.empty-state i {
    font-size: 52px;
    color: #0052cc;
    margin-bottom: 25px;
}

@media (max-width: 768px) {
    body {
        padding: 20px 15px;
    }
    
    .header {
        padding: 30px 20px;
    }
    
    .booking-info {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .reviewer-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .review-card {
        padding: 20px;
    }

    
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Review Pemesanan</h1>
            <p>Bagikan pengalaman perjalanan Anda</p>
        </div>
        <div class="action">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke beranda
            </a>
        </div>
    
        <div class="review-section">
            <h2>Pesanan Anda</h2>
            @foreach ($paidOrders as $order)
            <div class="booking-info">
                <div class="info-item">
                    <span class="info-label">Tujuan Wisata</span>
                    <span class="info-value">{{ $order->destinasi->tujuan }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Tanggal Perjalanan</span>
                    <span class="info-value">{{ $order->tanggal }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status</span>
                    <span class="info-value">{{ $order->status_pembayaran }}</span>
                </div>
    
                @php
                    $reviewed = $order->review; // Mengambil review yang terkait dengan pesanan
                @endphp
    
                <form method="POST" action="{{ route('review.store') }}" class="review-form" @if($reviewed) disabled @endif>
                    @csrf
                    <input type="hidden" name="pemesanan_id" value="{{ $order->id }}">
                    
                    <div class="rating">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" class="rating-input" required>
                    </div>
    
                    <textarea name="review_text" placeholder="Bagikan pengalaman perjalanan Anda..." @if($reviewed) disabled @endif></textarea>
    
                    <button type="submit" class="btn btn-submit" @if($reviewed) disabled @endif>
                        <i class="fas fa-paper-plane"></i>
                        Kirim Review
                    </button>
                </form>
    
                @if($reviewed)
                    <p>Anda sudah memberikan review untuk pesanan ini, Terimakasih!!</p>
                @endif
            </div>
            @endforeach
        </div>
    
        <div class="review-history">
            <h2>Riwayat Review</h2>
            @foreach ($userReviews as $review)
            <div class="review-card">
                <div class="review-header">
                    <div class="reviewer-info">
                        <div class="reviewer-name">{{ $review->user->name }}</div>
                        <div class="review-date">{{ $review->created_at->format('d M Y') }}</div>
                        
                    </div>
                    <div class="reviewer-info">
                        
                        <div class="reviewer-name">{{ $order->destinasi->tujuan }}</div>
                        
                    </div>
                </div>
                <div class="review-rating">
                    @for ($i = 1; $i <= $review->rating; $i++)
                    <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="review-text">{{ $review->review_text }}</p>
            </div>
            @endforeach
        </div>
    </div>

<script>
        // Star rating functionality
        document.querySelectorAll('.stars').forEach(starContainer => {
            const stars = starContainer.querySelectorAll('.fa-star');
            const ratingInput = starContainer.nextElementSibling;

            stars.forEach(star => {
                star.addEventListener('mouseover', () => {
                    stars.forEach(s => s.classList.toggle('active', s.dataset.rating <= star.dataset.rating));
                });

                star.addEventListener('mouseout', () => {
                    stars.forEach(s => s.classList.remove('active'));
                    stars.forEach(s => s.classList.toggle('selected', s.dataset.rating <= ratingInput.value));
                });

                star.addEventListener('click', () => {
                    ratingInput.value = star.dataset.rating;
                    stars.forEach(s => s.classList.toggle('selected', s.dataset.rating <= star.dataset.rating));
                });
            });
});
</script>
</body>
</html>