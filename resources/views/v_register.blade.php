<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - SB Admin 2</title>

    <!-- Fonts & Styles -->
    <link href="{{ asset('assets/tamplate/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('assets/tamplate/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                            </div>
                            <form class="user" method="POST" action="/register">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <select name="level" class="form-control form-control-user" required>
                                        <option value="">-- Pilih Level --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                        <option value="3">Mahasiswa</option>
                                        <option value="4">Dosen</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('assets/tamplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/tamplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/tamplate/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
