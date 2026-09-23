<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Sistem Antrian & Manajemen</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/header.png') }}">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Font: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            background-color: #0f172a;
        }

        /* === Background Illustration === */
        .background-illustration {
            position: absolute;
            inset: 0;
            z-index: 1;
            background: url('https://pustaka.bca.co.id/Promo/A2C31A68-BC10-4CBD-AB51-85474A36CC50/Detail/ImageListing/20250723_PRAMITA-LAB-SBY-thumb.jpeg') center/cover no-repeat;
            filter: blur(4px);
            transform: scale(1.05);
        }

        /* === Dark Gradient Overlay === */
        .background-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(30, 58, 138, 0.75));
        }

        /* === Login Card Glassmorphism === */
        .login-card {
            position: relative;
            z-index: 3;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
            max-width: 440px;
            width: 100%;
            padding: 2rem;
            margin: 1rem;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h4 {
            font-weight: 700;
            color: #0f172a;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border-color: #cbd5e1;
            background-color: #f8fafc;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
        }

        .input-group-text {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            border-radius: 0.75rem 0 0 0.75rem;
            color: #64748b;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 0.75rem 0.75rem 0;
        }

        .input-group:focus-within .input-group-text {
            border-color: #0ea5e9;
            background-color: #ffffff;
            color: #0ea5e9;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(2, 132, 199, 0.4);
            background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
        }

        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        /* === Fullscreen Dark Loading & Status Overlay === */
        #loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #ffffff;
            padding: 1.5rem;
            text-align: center;
        }

        .loading-spinner {
            width: 3.5rem;
            height: 3.5rem;
            border-width: 0.35rem;
            color: #0ea5e9;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Background Image -->
    <div class="background-illustration"></div>

    <!-- Dark Gradient Overlay -->
    <div class="background-overlay"></div>

    <!-- Fullscreen Dark Loading & Status Overlay -->
    <div id="loading-overlay">
        <div id="overlay-content" class="d-flex flex-column align-items-center">
            <div class="spinner-border loading-spinner mb-3" role="status"></div>
            <h5 class="fw-semibold mb-1" id="loading-title">Sedang Memproses Login...</h5>
            <p class="text-light opacity-75 small mb-0" id="loading-desc">Mohon tunggu sebentar, sistem sedang memverifikasi kredensial Anda.</p>
        </div>
    </div>

    <!-- Login Card -->
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('vendor/new-anim.gif') }}" alt="Logo" class="img-fluid mb-2" style="max-height: 80px; width: auto;">
            <h4 class="mb-1">Selamat Datang</h4>
            <p class="text-muted small">Silakan masuk menggunakan akun Anda</p>
        </div>

        <form id="loginForm">
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold small text-secondary">Username / Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="username" class="form-control" placeholder="Masukkan username Anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold small text-secondary">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" id="password" class="form-control" placeholder="Masukkan kata sandi" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label for="rememberMe" class="form-check-label small text-muted">Ingat saya</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100" id="button-login-system">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
            </button>
        </form>

        <div class="footer-text">
            <span>Copyright &copy; 2026 PT Innoventra Solusi Digital</span>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const btn = document.getElementById('button-login-system');

            const loadingOverlay = document.getElementById('loading-overlay');
            const overlayContent = document.getElementById('overlay-content');

            // Reset tampilan overlay ke mode loading awal
            overlayContent.innerHTML = `
                <div class="spinner-border loading-spinner mb-3" role="status"></div>
                <h5 class="fw-semibold mb-1">Sedang Memproses Login...</h5>
                <p class="text-light opacity-75 small mb-0">Mohon tunggu sebentar, sistem sedang memverifikasi kredensial Anda.</p>
            `;
            loadingOverlay.style.display = 'flex';
            btn.disabled = true;

            $.ajax({
                    url: "{{ route('verifikasi_Login') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": email,
                        "password": password
                    },
                    dataType: 'json',
                })
                .done(function(response) {
                    if (response.status === 'success') {
                        // Tampilkan pesan sukses di area gelap, lalu pindah halaman
                        overlayContent.innerHTML = `
                        <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-1 text-white">Login Berhasil!</h5>
                        <p class="text-light opacity-75 small mb-0">${response.message}</p>
                    `;
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    }
                })
                .fail(function(xhr) {
                    btn.disabled = false;
                    let errorMsg = 'Username atau kata sandi yang Anda masukkan salah.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    // Tampilkan pesan error berupa teks di area gelap beserta tombol tutup
                    overlayContent.innerHTML = `
                    <i class="bi bi-x-circle-fill text-danger fs-1 mb-3"></i>
                    <h5 class="fw-bold mb-1 text-white">Login Gagal</h5>
                    <p class="text-light opacity-75 small mb-3">${errorMsg}</p>
                    <button class="btn btn-outline-light btn-sm px-4 rounded-pill fw-semibold" onclick="document.getElementById('loading-overlay').style.display='none'">Coba Lagi</button>
                `;
                });
        });
    </script>
</body>

</html>
