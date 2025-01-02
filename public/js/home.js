  
  // fungsi untuk notifikasi pada bell dropdown di Home.html
  $(document).ready(function() {
    // Cek status pembayaran saat halaman dimuat
    const paymentSuccess = localStorage.getItem('paymentSuccess');
  
    // Cek apakah ada notifikasi yang belum dibaca
    const hasNotification = localStorage.getItem('hasNotification');
  
    if (hasNotification === 'true') {
        // Tampilkan badge jika ada notifikasi
        $('#notification-badge').show();
        $('#notification-badge').text('1'); // Set jumlah notifikasi
        // Tampilkan dropdown
        $('#notification-dropdown').show();
        // Hapus status notifikasi setelah ditampilkan
        localStorage.removeItem('hasNotification');
    }
  
    // Nonaktifkan link jika pembayaran belum berhasil
    if (paymentSuccess !== 'true') {
        $('#cetak-tiket-link').css('pointer-events', 'none').css('color', 'gray'); // Menonaktifkan klik dan mengubah warna
    }  
  
    // Reset status pembayaran saat halaman dimuat
    localStorage.removeItem('paymentSuccess');
  });

  $('.activity-card').hover(
    function() {
        $(this).addClass('shadow-lg scale-up');
    },
    function() {
        $(this).removeClass('shadow-lg scale-up');
    }
);
  