<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            /* Ganti URL di bawah dengan gambar yang diinginkan */
            background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow-x: hidden;
        }
        /* Decorative blurred circles */
        .bg-blur {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.5;
            z-index: 0;
        }
        .bg-blur1 {
            width: 350px; height: 350px;
            background: #8ec5fc;
            top: -100px; left: -120px;
        }
        .bg-blur2 {
            width: 250px; height: 250px;
            background: #e0c3fc;
            bottom: 30px; right: -80px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 28px;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            padding: 2.7rem 2.2rem;
            transition: box-shadow 0.3s, border 0.3s;
            z-index: 1;
        }
        .glass-card:hover {
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.25);
            border: 2px solid rgba(142,197,252,0.25);
        }
        .nav-tabs {
            border-bottom: none;
        }
        .nav-tabs .nav-link.active {
            background: linear-gradient(90deg, #8ec5fc 0%, #e0c3fc 100%);
            border: none;
            color: #4e54c8;
            font-weight: 700;
            border-radius: 16px 16px 0 0;
            box-shadow: 0 2px 8px 0 rgba(142,197,252,0.15);
        }
        .nav-tabs .nav-link {
            color: #495057;
            border-radius: 16px 16px 0 0;
            margin-right: 4px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .form-floating > label > i {
            color: #4e54c8;
        }
        .form-control {
            background: #fff !important;
            border: 1px solid #ced4da;
            color: #222;
            border-radius: 12px;
            box-shadow: none;
            transition: border 0.2s, box-shadow 0.2s;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(142,197,252, 0.15);
            border-color: #8ec5fc;
            background: #fff !important;
        }
        /* .form-floating > label {
            background: rgba(255,255,255,0.7) !important;
            padding-left: 0.5rem;
            border-radius: 8px;
            font-weight: 500;
            color: #4e54c8;
        } */
        .btn-primary {
            background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%);
            border: none;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 12px;
            box-shadow: 0 2px 8px 0 rgba(142,197,252,0.15);
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #8f94fb 0%, #4e54c8 100%);
            box-shadow: 0 4px 16px 0 rgba(142,197,252,0.25);
        }
        .btn-outline-danger, .btn-outline-primary {
            background: #fff;
            border: 1.5px solid #dee2e6;
            font-weight: 500;
            border-radius: 12px;
            color: inherit;
            transition: background 0.2s, color 0.2s;
        }
        .btn-outline-danger:hover {
            background: #ea4335 !important;
            color: #fff !important;
            border-color: #ea4335 !important;
        }
        .btn-outline-primary:hover {
            background: #1877f3 !important;
            color: #fff !important;
            border-color: #1877f3 !important;
        }
        .alert-danger {
            background: rgba(255, 0, 0, 0.07);
            border: none;
            color: #b71c1c;
        }
        .tab-content {
            background: rgba(255, 255, 255, 0.18) !important;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 28px;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            z-index: 1;
        }
    </style>
</head>
<body class="bg-light">
    <div class="bg-blur bg-blur1"></div>
    <div class="bg-blur bg-blur2"></div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <ul class="nav nav-tabs mb-3" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Daftar</button>
                </li>
            </ul>

            <div class="tab-content border p-4 bg-white rounded shadow-sm glass-card">
                <!-- Login Tab -->
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="{{ route('login-user') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <label for="loginEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" placeholder="Password" required>
                            <label for="loginPassword"><i class="fas fa-lock me-2"></i>Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>

                        <div class="text-end mt-2">
                            {{-- <a href="{{ route('password.request') }}">Lupa password?</a> --}}
                        </div>

                        <div class="text-center my-3">atau login dengan</div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-outline-danger w-100 me-2">
                                <i class="fab fa-google me-2"></i>Google
                            </a>
                            <a href="#" class="btn btn-outline-primary w-100 ms-2">
                                <i class="fab fa-facebook me-2"></i>Facebook
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Register Tab -->
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong><i class="fas fa-exclamation-circle me-2"></i>Mohon perbaiki kesalahan berikut:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="registerName" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                            <label for="registerName"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="registerEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <label for="registerEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="registerPassword" name="password" placeholder="Password" required>
                            <label for="registerPassword"><i class="fas fa-lock me-2"></i>Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                            <label for="passwordConfirmation"><i class="fas fa-lock me-2"></i>Konfirmasi Password</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                Saya setuju dengan <a href="#">Syarat & Ketentuan</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
