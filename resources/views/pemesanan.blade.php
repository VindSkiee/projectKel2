@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pemesanan.css') }}">

<div class="container-pemesanan">
    
    <!-- Destination -->
    <div class="card my-5">
        <h1>{{ $destinasi->namawisata }}</h1>
        <h2>Tujuan Wisata</h2>
        <div class="destination-card">
            <img src="{{ $destinasi->image }}" alt="{{ $destinasi->namawisata }}" class="destination-img">
            <div class="destination-overlay">
                <div class="destination-name">{{ $destinasi->namawisata }}</div>
                <div class="destination-details">
                    <div class="detail-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>{{ $destinasi->jarak }}</span>
                    </div>
                    <div class="detail-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                        <span>{{ $destinasi->harga }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">
        <input type="hidden" name="jenis_kendaraan" id="vehicleTypeInput" value="bus">
        <input type="hidden" name="kursi_dipilih" id="selectedSeatsInput">
        <input type="hidden" name="total_pembayaran" id="totalPembayaranInput">
        <!-- Vehicle Selection -->
        <div class="card">
            
            <h2>Pilih Kendaraan</h2>
            <div class="vehicle-options">
                <button name="bus" class="vehicle-btn active" data-vehicle="bus" data-seats="45">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="6" width="18" height="12" rx="2"/>
                        <circle cx="7" cy="18" r="2"/>
                        <circle cx="17" cy="18" r="2"/>
                    </svg>
                    <div class="vehicle-info">
                        <span class="vehicle-name">Bus</span>
                        <span class="vehicle-seats">45 Kursi</span>
                    </div>
                </button>
                <button name="minibus" class="vehicle-btn" data-vehicle="minibus" data-seats="15">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="6" width="18" height="12" rx="2"/>
                        <circle cx="7" cy="18" r="2"/>
                        <circle cx="17" cy="18" r="2"/>
                    </svg>
                    <div class="vehicle-info">
                        <span class="vehicle-name">Mini Bus</span>
                        <span class="vehicle-seats">15 Kursi</span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Seat Selection -->
        <div class="card">
            <h2>Pilih Kursi</h2>
            <div class="seats-container">
                <div id="seatsGrid" class="bus-seats"></div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="card">
            <h2>Informasi Pribadi</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="fullName">Nama Lengkap</label>
                    <input type="text" id="fullName" name="nama_lengkap" class="form-input" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Nomor HP</label>
                    <input type="tel" id="phoneNumber" name="nomor_hp" class="form-input" placeholder="Contoh: 08123456789" required>
                </div>
                <div class="form-group">
                    <label for="paymentMethod">Metode Pembayaran</label>
                    <select id="paymentMethod" name="metode_pembayaran" class="form-input" required>
                        <option value="">Pilih metode pembayaran</option>
                        <option value="transfer" {{ optional($pemesanan->first())->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Jadwal Keberangkatan</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="tanggal">Tanggal Keberangkatan</label>
                    <input type="date" id="date" name="tanggal" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="paymentMethod">Jam Keberangkatan</label>
                    <select id="time" name="jam" class="form-input" required>
                        <option value="">Pilih jam keberangkatan</option>
                        <option value="09:00">09:00</option>
                        <option value="12:00" >12:00</option>
                        <option value="15:00" >15:00</option>
                        <option value="17:00" >17:00</option>
                    </select>
                    {{-- Voucher --}}
                    <select id="voucherSelect" name="voucher_id" onchange="updateVoucherDiscount()">
                        <label for="paymentMethod">Voucher</label>
                        <option value="">-- Pilih Voucher --</option>
                        @foreach ($userVouchers as $userVoucher)
                            @if (!$userVoucher->is_used)
                                <option value="{{ $userVoucher->voucher->id }}">
                                    {{ $userVoucher->voucher->kode_voucher }} - Diskon {{ $userVoucher->voucher->diskon }}%
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <input type="hidden" id="voucherDiscount" name="voucher_discount" value="0">
                </div>
            </div>
        </div>

        

            <div class="summary-container">
                <div class="summary-row">
                    <span class="summary-label">Nama Lengkap</span>
                    <span class="summary-value" id="summaryFullName">-</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Nomor HP</span>
                    <span class="summary-value" id="summaryPhone">-</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Metode Pembayaran</span>
                    <span class="summary-value" id="summaryPayment">-</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Jenis Kendaraan</span>
                    <span class="summary-value" id="summaryVehicle">Bus</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Tujuan</span>
                    <span class="summary-value">{{ $destinasi->tujuan }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Kursi Dipilih</span>
                    <span class="summary-value" id="summarySeats">0</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Harga per Kursi</span>
                    <span class="summary-value">{{ $destinasi->harga }}</span>
                </div>
                <div class="summary-row summary-total">
                    <span class="summary-label">Total Pembayaran</span>
                    <span class="summary-value" id="summaryTotal">IDR 0</span>
                </div>
                <button id="confirmButton" type="submit" class="book-now-btn" onclick="submitBooking()">Booking Sekarang</button>
                </div>
            </div>

    </form>
</div>

<script>

    // Initialize variables and state
    const selectedSeats = new Set();
    let currentVehicleType = 'bus';

    // Render seats when page loads
    document.addEventListener('DOMContentLoaded', () => {
        renderSeats('bus');
        attachFormListeners();
    });

    function attachFormListeners() {
        const form = document.querySelector('form');
        const inputs = {
            fullName: document.getElementById('fullName'),
            phoneNumber: document.getElementById('phoneNumber'),
            paymentMethod: document.getElementById('paymentMethod'),
            date: document.getElementById('date'),
            time: document.getElementById('time')
        };

        Object.values(inputs).forEach(input => {
            if (input) {
                input.addEventListener('input', updatePersonalInfo);
                input.addEventListener('change', updatePersonalInfo);
            }
        });

        if (form) {
            form.addEventListener('submit', handleSubmit);
        }
    }

    async function renderSeats(vehicleType) {
        const seatsGrid = document.getElementById('seatsGrid');
        if (!seatsGrid) return;
        
        seatsGrid.innerHTML = '';
        selectedSeats.clear();

        const bookedSeats = await getBookedSeats();
        const seatCount = vehicleType === 'bus' ? 45 : 15;
        
        // Update the grid class based on vehicle type
        seatsGrid.className = vehicleType === 'bus' ? 'bus-seats' : 'minibus-seats';

        for (let i = 1; i <= seatCount; i++) {
            const seatNumber = vehicleType === 'bus' ? `B${i}` : `MB${i}`;
            const isBooked = bookedSeats.includes(seatNumber);
            
            const seatBtn = document.createElement('button');
            seatBtn.type = 'button'; // Add this to prevent form submission
            seatBtn.className = `seat-btn ${isBooked ? 'booked' : ''}`;
            seatBtn.disabled = isBooked;
            
            seatBtn.innerHTML = `
                ${createSeatIcon(false, isBooked)}
                <span class="seat-info">Kursi ${seatNumber}</span>
            `;
            
            if (!isBooked) {
                seatBtn.addEventListener('click', () => toggleSeat(seatNumber, seatBtn));
            }
            
            seatsGrid.appendChild(seatBtn);
        }
        updateSummary();
    }

    async function getBookedSeats() {
        try {
            const destinasiId = document.querySelector('input[name="destinasi_id"]').value;
            const response = await fetch(`/api/booked-seats/${currentVehicleType}/${destinasiId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching booked seats:', error);
            return [];
        }
    }

    function handleSubmit(event) {
        event.preventDefault();
        
        
        const nama_lengkap = document.getElementById('fullName').value;
        const nomor_hp = document.getElementById('phoneNumber').value;
        const metode_pembayaran = document.getElementById('paymentMethod').value;
        const tanggal = document.getElementById('date').value;
        const jam = document.getElementById('time').value;
        const kursi_dipilih = Array.from(selectedSeats);
        
        
        console.log({
            nama_lengkap,
            nomor_hp,
            metode_pembayaran,
            tanggal,
            jam,
            kursi_dipilih,
            currentVehicleType
        });

        
        if (kursi_dipilih.length === 0) {
            alert('Mohon pilih kursi terlebih dahulu');
            return;
        }

        
        if (!nama_lengkap || !nomor_hp || !metode_pembayaran || !tanggal || !jam) {
            alert('Mohon lengkapi semua field yang diperlukan');
            return;
        }

        
        const validTimes = ['09:00', '12:00', '15:00', '17:00'];
        if (!validTimes.includes(jam)) {
            alert('Pilih jam keberangkatan yang valid');
            return;
        }

        
        const userConfirmed = confirm('Apakah Anda yakin ingin melanjutkan pemesanan?');
        if (userConfirmed) {
           
            alert('Pemesanan berhasil dikonfirmasi!');
         } else {
            alert('Pemesanan dibatalkan.');
            event.preventDefault(); 
        }
        

        document.getElementById('selectedSeatsInput').value = kursi_dipilih.join(',');
        
        const basePrice = parseInt(document.querySelector('.summary-row:nth-child(7) .summary-value').textContent.replace(/[^0-9]/g, ''));
        const totalPayment = kursi_dipilih.length * basePrice;
        document.getElementById('totalPembayaranInput').value = totalPayment;

        event.target.submit();
    }

    function updatePersonalInfo() {
    const summaryElements = {
        fullName: document.getElementById('summaryFullName'),
        phone: document.getElementById('summaryPhone'),
        payment: document.getElementById('summaryPayment')
    };

    const inputs = {
        fullName: document.getElementById('fullName').value,
        phone: document.getElementById('phoneNumber').value,
        payment: document.getElementById('paymentMethod')
    };

    // Update summary display
    if (summaryElements.fullName) summaryElements.fullName.textContent = inputs.fullName || '-';
    if (summaryElements.phone) summaryElements.phone.textContent = inputs.phone || '-';
    if (summaryElements.payment && inputs.payment) {
        summaryElements.payment.textContent = inputs.payment.options[inputs.payment.selectedIndex]?.text || '-';
    }
}

    function updatePersonalInfo() {
        const summaryElements = {
            fullName: document.getElementById('summaryFullName'),
            phone: document.getElementById('summaryPhone'),
            payment: document.getElementById('summaryPayment')
        };

        const inputs = {
            fullName: document.getElementById('fullName').value,
            phone: document.getElementById('phoneNumber').value,
            payment: document.getElementById('paymentMethod')
        };

        // Update summary display
        if (summaryElements.fullName) summaryElements.fullName.textContent = inputs.fullName || '-';
        if (summaryElements.phone) summaryElements.phone.textContent = inputs.phone || '-';
        if (summaryElements.payment && inputs.payment) {
            summaryElements.payment.textContent = inputs.payment.options[inputs.payment.selectedIndex]?.text || '-';
        }
    }

    function updateSummary() {
        const seatsCount = selectedSeats.size;
        const basePrice = parseInt(document.querySelector('.summary-row:nth-child(7) .summary-value').textContent.replace(/[^0-9]/g, ''));
        const totalPrice = seatsCount * basePrice;

        const summarySeatsElement = document.getElementById('summarySeats');
        const summaryTotalElement = document.getElementById('summaryTotal');

        if (summarySeatsElement) {
            summarySeatsElement.textContent = `${seatsCount} Kursi (${Array.from(selectedSeats).sort().join(', ')})`;
        }
        
        if (summaryTotalElement) {
            summaryTotalElement.textContent = `IDR ${totalPrice.toLocaleString('id-ID')}`;
        }
    }

    function toggleSeat(seatNumber, button) {
        if (selectedSeats.has(seatNumber)) {
            selectedSeats.delete(seatNumber);
            button.classList.remove('selected');
            button.innerHTML = `
                ${createSeatIcon()}
                <span class="seat-info">Kursi ${seatNumber}</span>
            `;
        } else {
            selectedSeats.add(seatNumber);
            button.classList.add('selected');
            button.innerHTML = `
                ${createSeatIcon(true)}
                <span class="seat-info">Kursi ${seatNumber}</span>
            `;
        }
        updateSummary();
    }

    function createSeatIcon(selected = false, booked = false) {
        const color = selected ? 'white' : (booked ? '#9CA3AF' : 'currentColor');
        return `
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2">
                <path d="M7 13v-3a5 5 0 0 1 10 0v3"/>
                <rect x="4" y="13" width="16" height="8" rx="2"/>
            </svg>
        `;
    }

    // Vehicle button click handlers
    document.querySelectorAll('.vehicle-btn').forEach(btn => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const activeBtn = document.querySelector('.vehicle-btn.active');
            if (activeBtn) {
                activeBtn.classList.remove('active');
            }
            btn.classList.add('active');
            
            currentVehicleType = btn.dataset.vehicle;
            const summaryVehicle = document.getElementById('summaryVehicle');
            if (summaryVehicle) {
                summaryVehicle.textContent = currentVehicleType === 'bus' ? 'Bus' : 'Mini Bus';
            }
            
            await renderSeats(currentVehicleType);
        });
    });

    

</script>

@endsection