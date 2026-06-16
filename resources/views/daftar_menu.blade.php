<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNACKER - Pesan Online | Kotabaru Cikampek</title>
    <meta name="description" content="Pesan makanan online dari SNACKER Kotabaru Cikampek. Ayam geprek, nasi goreng, seblak, dan lainnya.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-primary: #0f0f14;
            --bg-card: #1a1a24;
            --bg-card-hover: #22222e;
            --accent: #ff6b35;
            --accent-light: #ff8c5a;
            --accent-glow: rgba(255, 107, 53, 0.25);
            --green: #00d26a;
            --green-glow: rgba(0, 210, 106, 0.3);
            --text-primary: #f0f0f5;
            --text-secondary: #8a8a9a;
            --text-muted: #5a5a6e;
            --border: rgba(255,255,255,0.06);
            --glass: rgba(26, 26, 36, 0.85);
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            padding-bottom: 120px;
            min-height: 100vh;
        }
        /* Ambient glow */
        body::before {
            content: '';
            position: fixed; top: -200px; left: -100px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,107,53,0.08) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }
        body::after {
            content: '';
            position: fixed; bottom: -200px; right: -100px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(0,210,106,0.05) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }

        /* NAVBAR */
        .navbar-custom {
            background: var(--glass);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 16px 0;
            position: sticky; top: 0; z-index: 100;
        }
        .brand-logo {
            font-weight: 800; font-size: 26px;
            background: linear-gradient(135deg, var(--accent), #ffaa33);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .loc-badge {
            background: rgba(255,107,53,0.1);
            border: 1px solid rgba(255,107,53,0.2);
            border-radius: 100px; padding: 6px 16px;
            font-size: 12px; font-weight: 600; color: var(--accent-light);
        }

        /* HERO */
        .hero-section {
            padding: 32px 0 8px;
            position: relative;
        }
        .hero-title {
            font-size: 28px; font-weight: 800; line-height: 1.3;
            background: linear-gradient(135deg, #fff, #ccc);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .hero-sub {
            color: var(--text-secondary); font-size: 14px; margin-top: 8px;
        }

        /* ORDER FORM */
        .order-form {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 24px; padding: 24px;
            margin-bottom: 28px;
            position: relative; overflow: hidden;
        }
        .order-form::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--green), var(--accent));
        }
        .order-form .form-label {
            font-weight: 700; font-size: 13px; color: var(--accent-light);
            text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;
        }
        .form-input {
            background: rgba(255,255,255,0.04) !important;
            border: 1px solid var(--border) !important;
            border-radius: 16px !important; color: var(--text-primary) !important;
            font-size: 14px; padding: 12px 16px !important;
            transition: all 0.2s;
        }
        .form-input:focus {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px var(--accent-glow) !important;
            background: rgba(255,255,255,0.06) !important;
        }
        .form-input::placeholder { color: var(--text-muted) !important; }

        /* PAYMENT METHOD */
        .pay-section { margin-top: 20px; }
        .pay-options {
            display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;
        }
        .pay-opt {
            flex: 1; min-width: 120px;
            padding: 14px 16px; border-radius: 16px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            cursor: pointer; transition: all 0.25s;
            text-align: center; position: relative;
        }
        .pay-opt:hover {
            border-color: rgba(255,107,53,0.3);
            background: rgba(255,255,255,0.06);
        }
        .pay-opt.selected {
            border-color: var(--accent);
            background: rgba(255,107,53,0.08);
            box-shadow: 0 0 0 2px var(--accent-glow);
        }
        .pay-opt .pay-icon {
            font-size: 22px; margin-bottom: 6px;
        }
        .pay-opt .pay-name {
            font-weight: 700; font-size: 13px; color: var(--text-primary);
        }
        .pay-opt .pay-desc {
            font-size: 11px; color: var(--text-muted); margin-top: 2px;
        }
        .pay-opt .check-mark {
            position: absolute; top: 8px; right: 8px;
            width: 20px; height: 20px; border-radius: 50%;
            background: var(--accent); color: white;
            display: none; align-items: center; justify-content: center;
            font-size: 11px;
        }
        .pay-opt.selected .check-mark { display: flex; }
        .bank-details {
            margin-top: 14px; padding: 16px;
            background: rgba(255,255,255,0.03);
            border: 1px dashed rgba(255,107,53,0.3);
            border-radius: 16px;
            display: none;
        }
        .bank-details.show { display: block; }
        .bank-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 10px 14px; margin-bottom: 8px;
            background: rgba(255,255,255,0.04);
            border-radius: 12px; border: 1px solid var(--border);
        }
        .bank-item:last-child { margin-bottom: 0; }
        .bank-item .bank-info { flex: 1; }
        .bank-item .bank-label {
            font-size: 11px; font-weight: 600; color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .bank-item .bank-number {
            font-size: 15px; font-weight: 800; color: var(--text-primary);
            letter-spacing: 1px; margin-top: 2px;
        }
        .bank-item .bank-holder {
            font-size: 12px; color: var(--accent-light); margin-top: 1px;
        }
        .btn-copy {
            background: rgba(255,107,53,0.15); border: none;
            border-radius: 10px; padding: 8px 14px;
            color: var(--accent); font-weight: 700; font-size: 12px;
            cursor: pointer; transition: all 0.2s;
        }
        .btn-copy:hover {
            background: var(--accent); color: white;
        }
        .btn-copy.copied {
            background: var(--green); color: white;
        }
        .pay-note {
            font-size: 11px; color: var(--text-muted);
            margin-top: 10px; line-height: 1.5;
            padding: 10px 14px;
            background: rgba(255,255,255,0.02);
            border-radius: 12px;
        }

        .btn-gps {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border: none; border-radius: 16px; padding: 12px;
            font-weight: 700; font-size: 13px; color: white;
            transition: all 0.25s; width: 100%;
        }
        .btn-gps:hover {
            transform: translateY(-1px); color: white;
            box-shadow: 0 8px 20px rgba(59,130,246,0.3);
        }

        /* CATEGORY TABS */
        .cat-tabs {
            display: flex; gap: 10px; overflow-x: auto;
            padding: 8px 0 20px; scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .cat-tabs::-webkit-scrollbar { display: none; }
        .cat-tab {
            border: none; border-radius: 100px; padding: 10px 22px;
            font-weight: 700; font-size: 13px; white-space: nowrap;
            background: var(--bg-card); color: var(--text-secondary);
            border: 1px solid var(--border);
            transition: all 0.25s; cursor: pointer;
        }
        .cat-tab.active {
            background: linear-gradient(135deg, var(--accent), #ff8833);
            color: white; border-color: transparent;
            box-shadow: 0 6px 20px var(--accent-glow);
        }
        .cat-tab:hover:not(.active) {
            background: var(--bg-card-hover);
            border-color: rgba(255,107,53,0.3);
            color: var(--text-primary);
        }

        /* SECTION LABEL */
        .section-label {
            font-size: 18px; font-weight: 800; margin-bottom: 16px;
            display: flex; align-items: center; gap: 10px;
        }
        .section-label .line {
            flex: 1; height: 1px; background: var(--border);
        }
        .item-count {
            font-size: 12px; font-weight: 600;
            color: var(--text-muted);
            background: rgba(255,255,255,0.04);
            padding: 4px 12px; border-radius: 100px;
        }

        /* FOOD CARD */
        .food-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .food-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255,107,53,0.25);
            box-shadow: 0 16px 40px rgba(0,0,0,0.3), 0 0 30px var(--accent-glow);
        }
        .food-card .card-img-wrap {
            position: relative; width: 100%;
            aspect-ratio: 4/3; overflow: hidden;
            background: linear-gradient(135deg, #1e1e2e, #2a2a3a);
        }
        .food-card .card-img-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.4s;
        }
        .food-card:hover .card-img-wrap img {
            transform: scale(1.08);
        }
        .food-card .emoji-placeholder {
            width: 100%; height: 100%;
            display: flex; align-items: center; justify-content: center;
            font-size: 48px;
            background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,170,51,0.08));
        }
        .food-card .card-img-wrap .cat-badge {
            position: absolute; top: 10px; left: 10px;
            background: rgba(0,0,0,0.6); backdrop-filter: blur(8px);
            border-radius: 100px; padding: 4px 10px;
            font-size: 10px; font-weight: 700; color: var(--accent-light);
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .food-card .card-body {
            padding: 14px 16px 16px;
        }
        .food-card .food-name {
            font-weight: 700; font-size: 14px; color: var(--text-primary);
            line-height: 1.3; margin-bottom: 4px;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .food-card .food-desc {
            font-size: 11px; color: var(--text-muted);
            margin-bottom: 10px; line-height: 1.4;
            display: -webkit-box; -webkit-line-clamp: 1;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .food-card .food-price {
            font-weight: 800; font-size: 16px;
            background: linear-gradient(135deg, var(--accent), #ffaa33);
            -webkit-background-clip: text; background-clip: text; color: transparent;
            margin-bottom: 12px;
        }

        /* QTY CONTROLS */
        .qty-wrap {
            display: flex; align-items: center; gap: 6px;
        }
        .btn-qty {
            width: 36px; height: 36px; border-radius: 12px;
            border: none; font-weight: 800; font-size: 16px;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.2s; cursor: pointer; flex-shrink: 0;
        }
        .btn-minus {
            background: rgba(255,255,255,0.06); color: var(--accent);
        }
        .btn-minus:hover { background: var(--accent); color: white; }
        .btn-plus-small {
            background: linear-gradient(135deg, var(--accent), #ff8833);
            color: white;
            box-shadow: 0 4px 12px var(--accent-glow);
        }
        .btn-plus-small:hover { transform: scale(1.05); }
        .btn-add-full {
            width: 100%; height: 38px; border-radius: 12px;
            border: none; font-weight: 700; font-size: 13px;
            background: linear-gradient(135deg, var(--accent), #ff8833);
            color: white; cursor: pointer;
            box-shadow: 0 4px 12px var(--accent-glow);
            transition: all 0.25s;
            display: flex; align-items: center; justify-content: center; gap: 6px;
        }
        .btn-add-full:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px var(--accent-glow);
        }
        .qty-num {
            font-weight: 800; font-size: 15px; color: var(--accent);
            min-width: 28px; text-align: center;
            background: rgba(255,107,53,0.08);
            padding: 6px 4px; border-radius: 8px;
        }

        /* CART FOOTER */
        .cart-footer {
            position: fixed; bottom: 0; left: 0; right: 0;
            background: var(--glass);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            padding: 18px 0;
            border-top: 1px solid var(--border);
            z-index: 1000;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .cart-footer.show { transform: translateY(0); }
        .cart-total-label {
            font-size: 12px; font-weight: 600; color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .cart-total-price {
            font-size: 24px; font-weight: 800;
            background: linear-gradient(135deg, var(--accent), #ffaa33);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .btn-checkout {
            background: linear-gradient(135deg, var(--green), #00b85c);
            border: none; border-radius: 16px;
            padding: 14px 28px; font-weight: 800; font-size: 14px;
            color: white; transition: all 0.25s; cursor: pointer;
            box-shadow: 0 6px 20px var(--green-glow);
            display: flex; align-items: center; gap: 8px;
        }
        .btn-checkout:hover {
            transform: translateY(-2px); color: white;
            box-shadow: 0 10px 30px var(--green-glow);
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .menu-item { animation: fadeInUp 0.4s ease forwards; opacity: 0; }

        /* SCROLL */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--text-muted); border-radius: 10px; }

        /* RESPONSIVE */
        @media (max-width: 576px) {
            .hero-title { font-size: 22px; }
            .food-card .card-body { padding: 10px 12px 14px; }
            .food-card .food-name { font-size: 13px; }
            .food-card .food-price { font-size: 14px; }
            .btn-add-full { height: 34px; font-size: 12px; }
            .btn-qty { width: 32px; height: 32px; font-size: 14px; }
            .cart-total-price { font-size: 20px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar-custom">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="brand-logo">🔥 SNACKER</span>
        <span class="loc-badge"><i class="bi bi-geo-alt-fill me-1"></i> Kotabaru Cikampek</span>
    </div>
</nav>

<!-- HERO -->
<div class="container hero-section">
    <h1 class="hero-title">Mau makan apa<br>hari ini? 🍽️</h1>
    <p class="hero-sub">Pilih menu favorit kamu, pesan langsung via WhatsApp!</p>
</div>

<!-- ORDER FORM -->
<div class="container">
    <div class="order-form">
        <div class="mb-3">
            <label class="form-label"><i class="bi bi-person-fill me-1"></i> Nama Pemesan</label>
            <input type="text" id="nama_cust" class="form-control form-input" placeholder="Masukkan nama lengkap kamu">
        </div>
        <button type="button" onclick="getLocation()" class="btn btn-gps mb-3">
            <i class="bi bi-crosshair me-2"></i> Gunakan Lokasi GPS Otomatis
        </button>
        <div class="mb-3">
            <label class="form-label"><i class="bi bi-pin-map-fill me-1"></i> Alamat Pengiriman</label>
            <textarea id="alamat_cust" class="form-control form-input" placeholder="Alamat lengkap + patokan biar kurir gak nyasar" rows="3"></textarea>
        </div>

        <!-- PAYMENT METHOD -->
        <div class="pay-section">
            <label class="form-label"><i class="bi bi-credit-card-fill me-1"></i> Metode Pembayaran</label>
            <div class="pay-options">
                <div class="pay-opt selected" onclick="selectPayment('cod', this)">
                    <div class="check-mark"><i class="bi bi-check"></i></div>
                    <div class="pay-icon"><i class="bi bi-cash-stack"></i></div>
                    <div class="pay-name">Bayar di Tempat</div>
                    <div class="pay-desc">COD (Cash)</div>
                </div>
                <div class="pay-opt" onclick="selectPayment('transfer', this)">
                    <div class="check-mark"><i class="bi bi-check"></i></div>
                    <div class="pay-icon"><i class="bi bi-bank"></i></div>
                    <div class="pay-name">Transfer Bank</div>
                    <div class="pay-desc">BCA / BRI</div>
                </div>
                <div class="pay-opt" onclick="selectPayment('ewallet', this)">
                    <div class="check-mark"><i class="bi bi-check"></i></div>
                    <div class="pay-icon"><i class="bi bi-phone"></i></div>
                    <div class="pay-name">E-Wallet</div>
                    <div class="pay-desc">Dana / ShopeePay</div>
                </div>
            </div>

            <!-- Bank Transfer Details -->
            <div class="bank-details" id="bankDetails">
                <div class="bank-item">
                    <div class="bank-info">
                        <div class="bank-label">BCA</div>
                        <div class="bank-number" id="bca-num">1234567890</div>
                        <div class="bank-holder">a.n. SNACKER OFFICIAL</div>
                    </div>
                    <button class="btn-copy" onclick="copyNumber('1234567890', this)">Salin</button>
                </div>
                <div class="bank-item">
                    <div class="bank-info">
                        <div class="bank-label">BRI</div>
                        <div class="bank-number" id="bri-num">0987654321</div>
                        <div class="bank-holder">a.n. SNACKER OFFICIAL</div>
                    </div>
                    <button class="btn-copy" onclick="copyNumber('0987654321', this)">Salin</button>
                </div>
            </div>

            <!-- E-Wallet Details -->
            <div class="bank-details" id="ewalletDetails">
                <div class="bank-item">
                    <div class="bank-info">
                        <div class="bank-label">DANA</div>
                        <div class="bank-number">0895622101502</div>
                        <div class="bank-holder">a.n. SNACKER OFFICIAL</div>
                    </div>
                    <button class="btn-copy" onclick="copyNumber('0895622101502', this)">Salin</button>
                </div>
                <div class="bank-item">
                    <div class="bank-info">
                        <div class="bank-label">SHOPEEPAY</div>
                        <div class="bank-number">0895622101502</div>
                        <div class="bank-holder">a.n. SNACKER OFFICIAL</div>
                    </div>
                    <button class="btn-copy" onclick="copyNumber('0895622101502', this)">Salin</button>
                </div>
            </div>

            <div class="pay-note" id="payNote">
                <i class="bi bi-info-circle me-1"></i>
                <span id="payNoteText">Pembayaran langsung ke kurir saat pesanan sampai.</span>
            </div>
        </div>
    </div>
</div>

<!-- CATEGORY TABS -->
<div class="container">
    <div class="cat-tabs" id="categoryTabs">
        <button class="cat-tab active" onclick="filterMenu('semua', this)">✨ Semua</button>
        <button class="cat-tab" onclick="filterMenu('makanan', this)">🍛 Makanan</button>
        <button class="cat-tab" onclick="filterMenu('cemilan', this)">🍟 Cemilan</button>
        <button class="cat-tab" onclick="filterMenu('minuman', this)">🥤 Minuman</button>
    </div>
</div>

<!-- MENU GRID -->
<div class="container">
    <div class="section-label">
        <span>Menu Tersedia</span>
        <span class="line"></span>
        <span class="item-count" id="visibleCount">{{ count($dataMenu) }} menu</span>
    </div>
    <div class="row g-3" id="menuContainer">
        @foreach($dataMenu as $index => $menu)
        <div class="col-6 col-md-4 col-lg-3 menu-item" data-category="{{ $menu['kategori'] }}" style="animation-delay: {{ $index * 0.03 }}s">
            <div class="food-card h-100">
                <div class="card-img-wrap">
                    <div class="emoji-placeholder">
                        @if($menu['kategori'] === 'makanan')
                            @php
                                $emojis = ['🍗','🍛','🍖','🥘','🍲','🥩','🍜'];
                                echo $emojis[$index % count($emojis)];
                            @endphp
                        @elseif($menu['kategori'] === 'cemilan')
                            @php
                                $emojis = ['🍟','🧆','🥟','🍢','🍡','🥮','🍘'];
                                echo $emojis[$index % count($emojis)];
                            @endphp
                        @else
                            @php
                                $emojis = ['🧃','🥤','☕','🍹','🧋','🫗','🍵'];
                                echo $emojis[$index % count($emojis)];
                            @endphp
                        @endif
                    </div>
                    <span class="cat-badge">{{ $menu['kategori'] }}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="food-name">{{ $menu['nama'] }}</h3>
                    <p class="food-price">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</p>
                    <div class="mt-auto">
                        <div class="qty-wrap" id="qty-wrap-{{ $index }}" style="display: none;">
                            <button class="btn-qty btn-minus" onclick="updateQty('{{ addslashes($menu['nama']) }}', {{ $menu['harga'] }}, -1, {{ $index }})">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span class="qty-num" id="qty-{{ $index }}">0</span>
                            <button class="btn-qty btn-plus-small" onclick="updateQty('{{ addslashes($menu['nama']) }}', {{ $menu['harga'] }}, 1, {{ $index }})">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <button class="btn-add-full" id="btn-add-{{ $index }}" onclick="updateQty('{{ addslashes($menu['nama']) }}', {{ $menu['harga'] }}, 1, {{ $index }})">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- CART FOOTER -->
<div class="cart-footer" id="cartBar">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <div class="cart-total-label"><i class="bi bi-bag-fill me-1"></i> <span id="totalItem">0</span> item dipilih</div>
            <div class="cart-total-price" id="totalPrice">Rp 0</div>
        </div>
        <button onclick="sendWhatsApp()" class="btn-checkout">
            <i class="bi bi-whatsapp" style="font-size: 18px;"></i>
            <span>Checkout</span>
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
</div>

<script>
let cart = {};

function filterMenu(kategori, el) {
    document.querySelectorAll('.cat-tab').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    let count = 0;
    document.querySelectorAll('.menu-item').forEach((item, i) => {
        const show = kategori === 'semua' || item.dataset.category === kategori;
        item.style.display = show ? '' : 'none';
        if (show) {
            count++;
            item.style.animationDelay = (count * 0.03) + 's';
            item.style.animation = 'none';
            item.offsetHeight; // reflow
            item.style.animation = '';
        }
    });
    document.getElementById('visibleCount').textContent = count + ' menu';
}

function updateQty(nama, harga, delta, id) {
    if (!cart[nama]) cart[nama] = { qty: 0, harga: harga };
    cart[nama].qty += delta;
    if (cart[nama].qty <= 0) delete cart[nama];

    const currentQty = cart[nama] ? cart[nama].qty : 0;
    const qtyWrap = document.getElementById(`qty-wrap-${id}`);
    const btnAdd = document.getElementById(`btn-add-${id}`);
    const qtyLabel = document.getElementById(`qty-${id}`);

    if (currentQty > 0) {
        qtyWrap.style.display = 'flex';
        btnAdd.style.display = 'none';
        qtyLabel.textContent = currentQty;
    } else {
        qtyWrap.style.display = 'none';
        btnAdd.style.display = 'flex';
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
    if (totalI > 0) {
        bar.classList.add('show');
    } else {
        bar.classList.remove('show');
    }
    document.getElementById('totalItem').textContent = totalI;
    document.getElementById('totalPrice').textContent = 'Rp ' + totalH.toLocaleString('id-ID');
}

function getLocation() {
    const alamatField = document.getElementById('alamat_cust');
    if (!navigator.geolocation) {
        alert('Browser kamu tidak mendukung fitur GPS.');
        return;
    }
    const btn = event.target.closest('button');
    const origHTML = btn.innerHTML;
    btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Mengambil lokasi...';
    btn.disabled = true;
    navigator.geolocation.getCurrentPosition(
        (pos) => {
            const lat = pos.coords.latitude, lon = pos.coords.longitude;
            const link = `https://www.google.com/maps?q=${lat},${lon}`;
            const time = new Date().toLocaleTimeString('id-ID');
            alamatField.value = `LINK LOKASI (${time})\n${link}\n\nDetail tambahan:\n`;
            btn.innerHTML = origHTML; btn.disabled = false;
        },
        (err) => {
            const msgs = {
                1: 'Izin lokasi ditolak. Aktifkan GPS di pengaturan.',
                2: 'Lokasi tidak tersedia. Coba isi alamat manual.',
                3: 'Waktu habis. Coba lagi atau isi manual.'
            };
            alert(msgs[err.code] || 'Gagal mengambil lokasi.');
            btn.innerHTML = origHTML; btn.disabled = false;
        },
        { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
    );
}

let selectedPayment = 'cod';

function selectPayment(method, el) {
    selectedPayment = method;
    document.querySelectorAll('.pay-opt').forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');

    document.getElementById('bankDetails').classList.remove('show');
    document.getElementById('ewalletDetails').classList.remove('show');

    const noteText = document.getElementById('payNoteText');
    if (method === 'cod') {
        noteText.textContent = 'Pembayaran langsung ke kurir saat pesanan sampai.';
    } else if (method === 'transfer') {
        document.getElementById('bankDetails').classList.add('show');
        noteText.textContent = 'Transfer sebelum pesanan diantar. Kirim bukti transfer via WhatsApp.';
    } else if (method === 'ewallet') {
        document.getElementById('ewalletDetails').classList.add('show');
        noteText.textContent = 'Transfer ke e-wallet sebelum pesanan diantar. Kirim bukti transfer via WhatsApp.';
    }
}

function copyNumber(num, btn) {
    navigator.clipboard.writeText(num).then(() => {
        const orig = btn.textContent;
        btn.textContent = 'Tersalin!';
        btn.classList.add('copied');
        setTimeout(() => {
            btn.textContent = orig;
            btn.classList.remove('copied');
        }, 2000);
    }).catch(() => {
        // Fallback for older browsers
        const ta = document.createElement('textarea');
        ta.value = num; document.body.appendChild(ta);
        ta.select(); document.execCommand('copy');
        document.body.removeChild(ta);
        const orig = btn.textContent;
        btn.textContent = 'Tersalin!';
        btn.classList.add('copied');
        setTimeout(() => {
            btn.textContent = orig;
            btn.classList.remove('copied');
        }, 2000);
    });
}

function sendWhatsApp() {
    const n = document.getElementById('nama_cust').value.trim();
    const a = document.getElementById('alamat_cust').value.trim();
    if (!n || !a) { alert('Yuk isi nama & alamat dulu biar pesanan langsung diproses!'); return; }
    if (!Object.keys(cart).length) { alert('Belum ada pesanan nih! Pilih menu dulu ya.'); return; }

    let list = '', total = 0;
    for (let key in cart) {
        let sub = cart[key].qty * cart[key].harga;
        list += `- ${key} (${cart[key].qty}x) = Rp ${sub.toLocaleString('id-ID')}\n`;
        total += sub;
    }

    const payLabels = {
        'cod': 'Bayar di Tempat (COD)',
        'transfer': 'Transfer Bank (BCA/BRI)',
        'ewallet': 'E-Wallet (Dana/ShopeePay)'
    };
    const payMethod = payLabels[selectedPayment] || 'Belum dipilih';

    const noWA = '62895622101502';
    const msg = `*ORDER SNACKER - Cikampek*\n\n` +
                `*Nama:* ${n}\n*Alamat:*\n${a}\n\n` +
                `*Pesanan:*\n${list}\n` +
                `*TOTAL BAYAR:* Rp ${total.toLocaleString('id-ID')}\n` +
                `*Pembayaran:* ${payMethod}\n\n` +
                `*Catatan:* Mohon segera diproses, terima kasih!`;
    window.open(`https://wa.me/${noWA}?text=${encodeURIComponent(msg)}`);
}
</script>

</body>
</html>