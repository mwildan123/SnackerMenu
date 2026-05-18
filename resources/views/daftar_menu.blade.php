<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>SNACKER - Pesan Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fef9f0 0%, #fff5e8 100%);
            padding-bottom: 110px;
        }

        /* Navbar Glassmorphism */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-bottom: 2px solid #ffb347;
        }

        .brand {
            font-weight: 800;
            font-size: 28px;
            background: linear-gradient(135deg, #e67e22, #f39c12);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .location-badge {
            background: rgba(243, 156, 18, 0.1);
            border-radius: 40px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            color: #e67e22;
            border: 1px solid rgba(230, 126, 34, 0.2);
        }

        /* Card Modern */
        .food-card {
            border: none;
            border-radius: 24px;
            background: white;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(255, 179, 71, 0.1);
        }

        .food-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 28px rgba(230, 126, 34, 0.12);
            border-color: rgba(230, 126, 34, 0.3);
        }

        .price {
            font-weight: 800;
            color: #e67e22;
            font-size: 15px;
        }

        /* Category Button Styling */
        .category-nav {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 12px 0 20px;
            scrollbar-width: thin;
        }

        .btn-cat {
            border-radius: 40px;
            padding: 10px 24px;
            border: none;
            background: white;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s ease;
            color: #5a4a3a;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            border: 1px solid #ffe0b5;
        }

        .btn-cat.active {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            color: white;
            box-shadow: 0 8px 16px rgba(230, 126, 34, 0.25);
            border: none;
        }

        /* Form address */
        .info-card {
            background: white;
            border-radius: 28px;
            border-left: 5px solid #f39c12;
            transition: all 0.2s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
        }

        /* Buttons qty */
        .btn-qty {
            width: 38px;
            height: 38px;
            border-radius: 16px;
            font-weight: 800;
            transition: all 0.15s ease;
            border: none;
            font-size: 16px;
        }

        .btn-minus {
            background: #f1f2f6;
            color: #e67e22;
            font-weight: 800;
        }

        .btn-minus:hover {
            background: #e67e22;
            color: white;
        }

        .btn-plus {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            color: white;
            font-weight: 700;
            box-shadow: 0 4px 8px rgba(230, 126, 34, 0.3);
        }

        .btn-plus:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, #d35400, #e67e22);
        }

        .qty-display {
            font-weight: 800;
            background: #fef5e7;
            padding: 6px 0;
            border-radius: 20px;
            min-width: 40px;
            text-align: center;
            color: #e67e22;
        }

        /* Cart Footer */
        .cart-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            padding: 20px 24px;
            box-shadow: 0 -12px 30px rgba(0, 0, 0, 0.08);
            z-index: 1000;
            border-radius: 32px 32px 0 0;
            border-top: 1px solid #ffe0b5;
        }

        .btn-checkout {
            background: linear-gradient(135deg, #25D366, #128C7E);
            border: none;
            padding: 12px 28px;
            border-radius: 60px;
            font-weight: 800;
            color: white;
            transition: all 0.2s;
            box-shadow: 0 6px 14px rgba(37, 211, 102, 0.3);
        }

        .btn-checkout:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, #20b859, #0e6b5e);
        }

        .total-price {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 26px;
        }

        input, textarea {
            border-radius: 20px !important;
            border: 1px solid #ffe0b5 !important;
            background: #fffaf5 !important;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            border-color: #f39c12 !important;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.1) !important;
        }

        .btn-gps {
            background: linear-gradient(135deg, #3498db, #2980b9);
            border: none;
            border-radius: 40px;
            padding: 10px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-gps:hover {
            transform: scale(1.01);
            background: linear-gradient(135deg, #2980b9, #1f618d);
        }

        .location-hint {
            font-size: 11px;
            color: #f39c12;
            background: #fff8e8;
            border-radius: 16px;
            padding: 6px 12px;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<nav class="navbar bg-white py-3 sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="brand">🍗 SNACKER.</span>
        <span class="location-badge"><i class="bi bi-pin-map-fill me-1"></i> Kotabaru Cikampek</span>
    </div>
</nav>

<div class="container mt-4">
    <div class="card info-card p-4 mb-5 border-0 shadow-sm">
        <h6 class="fw-bold mb-3" style="color: #e67e22;"><i class="bi bi-person-fill-check me-2"></i> Siapa yang mau ngorder?</h6>
        <input type="text" id="nama_cust" class="form-control mb-3" placeholder="Nama lengkap kamu">
        
        <button type="button" onclick="getLocation()" class="btn btn-gps text-white mb-2 w-100">
            <i class="bi bi-geo-alt-fill me-2"></i> 📍 Gunakan Lokasi Saat Ini (GPS)
        </button>
        
        <textarea id="alamat_cust" class="form-control" placeholder="Alamat lengkap + patokan biar kurir gak nyasar 🚚" rows="3"></textarea>
        <div class="location-hint text-center mt-2">
            <i class="bi bi-info-circle-fill me-1"></i> Klik tombol GPS di atas untuk otomatis mendapatkan link lokasi
        </div>
    </div>

    <div class="category-nav mb-4">
        <button class="btn-cat active" onclick="filterMenu('semua', this)">✨ Semua</button>
        <button class="btn-cat" onclick="filterMenu('makanan', this)">🍛 Makanan</button>
        <button class="btn-cat" onclick="filterMenu('cemilan', this)">🍟 Cemilan</button>
        <button class="btn-cat" onclick="filterMenu('minuman', this)">🥤 Minuman</button>
    </div>

    <div class="row g-4" id="menuContainer">
        @foreach($dataMenu as $index => $menu)
        <div class="col-6 col-md-4 col-lg-3 menu-item" data-category="{{ $menu['kategori'] }}">
            <div class="card food-card h-100 p-3">
                <div class="card-body p-0 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold mb-0" style="font-size: 15px; line-height: 1.35; color: #2c3e2f;">{{ $menu['nama'] }}</h6>
                        <i class="bi bi-bookmark-fill" style="color: #f39c12; font-size: 12px;"></i>
                    </div>
                    <p class="price mb-3">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</p>
                    
                    <div class="mt-auto d-flex align-items-center justify-content-between gap-2">
                        <button id="btn-minus-{{ $index }}" class="btn-qty btn-minus" style="display: none;" 
                                onclick="updateQty('{{ addslashes($menu['nama']) }}', {{ $menu['harga'] }}, -1, {{ $index }})">
                            <i class="bi bi-dash-lg"></i>
                        </button>
                        
                        <span id="qty-{{ $index }}" class="qty-display" style="display: none; flex: 1;">0</span>
                        
                        <button class="btn-qty btn-plus" id="btn-plus-{{ $index }}" style="flex: 1;"
                                onclick="updateQty('{{ addslashes($menu['nama']) }}', {{ $menu['harga'] }}, 1, {{ $index }})">
                            <i class="bi bi-plus-lg me-1"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="cart-footer" id="cartBar" style="display: none;">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <div class="small fw-semibold text-muted mb-1"><i class="bi bi-cart-fill me-1"></i> <span id="totalItem">0</span> item dalam keranjang</div>
            <div class="total-price fw-black" id="totalPrice">Rp 0</div>
        </div>
        <button onclick="sendWhatsApp()" class="btn-checkout">
            <i class="bi bi-whatsapp me-2"></i> Checkout Sekarang
        </button>
    </div>
</div>

<script>
let cart = {};

function filterMenu(kategori, element) {
    document.querySelectorAll('.btn-cat').forEach(btn => btn.classList.remove('active'));
    element.classList.add('active');

    document.querySelectorAll('.menu-item').forEach(item => {
        if (kategori === 'semua' || item.getAttribute('data-category') === kategori) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

function updateQty(nama, harga, delta, id) {
    if (!cart[nama]) cart[nama] = { qty: 0, harga: harga };
    
    cart[nama].qty += delta;
    if (cart[nama].qty <= 0) delete cart[nama];

    const qLabel = document.getElementById(`qty-${id}`);
    const bMinus = document.getElementById(`btn-minus-${id}`);
    const bPlus = document.getElementById(`btn-plus-${id}`);
    const currentQty = cart[nama] ? cart[nama].qty : 0;

    if (currentQty > 0) {
        qLabel.innerText = currentQty;
        qLabel.style.display = 'block';
        bMinus.style.display = 'flex';
        bPlus.style.flex = '0.8';
        bPlus.innerHTML = '<i class="bi bi-plus-lg"></i>';
    } else {
        qLabel.style.display = 'none';
        bMinus.style.display = 'none';
        bPlus.style.flex = '1';
        bPlus.innerHTML = '<i class="bi bi-plus-lg me-1"></i> Tambah';
    }

    renderFooter();
}

function renderFooter() {
    const bar = document.getElementById('cartBar');
    let totalH = 0, totalI = 0;

    for (let key in cart) {
        totalI += cart[key].qty;
        totalH += cart[key].qty * cart[key].harga;
    }

    bar.style.display = totalI > 0 ? 'block' : 'none';
    document.getElementById('totalItem').innerText = totalI;
    document.getElementById('totalPrice').innerHTML = "Rp " + totalH.toLocaleString('id-ID');
}

function getLocation() {
    const alamatField = document.getElementById('alamat_cust');
    
    // Cek apakah browser mendukung GPS
    if (navigator.geolocation) {
        alamatField.placeholder = "📍 Sedang mengambil lokasi...";
        alamatField.value = "";
        
        // Tampilkan loading toast atau alert ringan
        const btnGps = event.target.closest('button');
        const originalText = btnGps.innerHTML;
        btnGps.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Mengambil lokasi...';
        btnGps.disabled = true;
        
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                
                // Format jadi link Google Maps
                const googleMapsLink = `https://www.google.com/maps?q=${lat},${lon}`;
                const mapsShort = `https://maps.app.goo.gl/?q=${lat},${lon}`;
                
                // Buat format alamat yang lebih rapi
                const currentTime = new Date().toLocaleTimeString('id-ID');
                const alamatValue = `📍 LINK LOKASI OTOMATIS (${currentTime})\n${googleMapsLink}\n\n📝 Detail tambahan:\n(Rumah/Warung/Kantor, warna pagar, patokan, dll)\n__________________________________\n`;
                
                alamatField.value = alamatValue;
                alamatField.placeholder = "Alamat lengkap + patokan";
                
                // Reset tombol
                btnGps.innerHTML = originalText;
                btnGps.disabled = false;
                
                // Optional: alert sukses
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success alert-dismissible fade show mt-2 py-2';
                successAlert.style.fontSize = '12px';
                successAlert.innerHTML = '✅ Lokasi berhasil diambil! Link Maps sudah masuk ke alamat.';
                alamatField.parentNode.insertBefore(successAlert, alamatField.nextSibling);
                setTimeout(() => successAlert.remove(), 3000);
            },
            (error) => {
                let errorMsg = "";
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMsg = "Izin lokasi ditolak. Silakan aktifkan GPS di pengaturan browser/HP kamu.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMsg = "Lokasi tidak tersedia. Coba aktifkan GPS atau isi alamat manual.";
                        break;
                    case error.TIMEOUT:
                        errorMsg = "Waktu pengambilan lokasi habis. Coba lagi atau isi manual.";
                        break;
                    default:
                        errorMsg = "Gagal mengambil lokasi. Isi alamat manual ya.";
                }
                alert("⚠️ " + errorMsg);
                alamatField.placeholder = "Isi alamat manual atau paste link maps di sini";
                
                // Reset tombol
                btnGps.innerHTML = originalText;
                btnGps.disabled = false;
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    } else {
        alert("Browser kamu tidak mendukung fitur GPS.");
    }
}

function sendWhatsApp() {
    const n = document.getElementById('nama_cust').value.trim();
    const a = document.getElementById('alamat_cust').value.trim();
    if (!n || !a) {
        alert("Yuk isi nama & alamat dulu biar pesanan langsung diproses 🍽️");
        return;
    }

    if (Object.keys(cart).length === 0) {
        alert("Belum ada pesanan nih! Pilih menu dulu ya 😋");
        return;
    }

    let list = "", total = 0;
    for (let key in cart) {
        let sub = cart[key].qty * cart[key].harga;
        list += `▸ ${key} (${cart[key].qty}x) = Rp ${sub.toLocaleString('id-ID')}\n`;
        total += sub;
    }

    const noWA = "62895622101502";
    const msg = `🍗 *ORDER SNACKER - Cikampek* 🍗\n\n` +
                `👤 *Nama:* ${n}\n` +
                `📍 *Alamat:*\n${a}\n\n` +
                `🛒 *Pesanan:*\n${list}\n` +
                `💵 *TOTAL BAYAR:* Rp ${total.toLocaleString('id-ID')}\n\n` +
                `⏱️ *Catatan:* Mohon segera diproses, terima kasih! 🙏`;

    window.open(`https://wa.me/${noWA}?text=${encodeURIComponent(msg)}`);
}
</script>

</body>
</html>