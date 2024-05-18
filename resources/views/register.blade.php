<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>DLH Kota Surakarta&mdash;Register</title>
    <link rel="icon" href="{{ asset('template/assets/img/pemkot.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template/node_modules/selectric/public/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-3 col-xl-6 offset-xl-3">


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card card-success">
                        <div class="card-header">
                            <h3>Register</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group @error('email') is-invalid @enderror">
                                    <label for="first_name">Nama Perusahaan</label>
                                    <input id="first_name" type="text" class="form-control" name="nama_perusahaan"
                                        autofocus>
                                    @error('name')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') is-invalid @enderror">
                                    <label for="first_name">No Izin (NIB)</label>
                                    <input id="first_name" type="text" class="form-control" name="no_izin" autofocus>
                                    @error('name')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') is-invalid @enderror">
                                    <label for="first_name">Nama Pengguna</label>
                                    <input id="first_name" type="text" class="form-control" name="name" autofocus>
                                    @error('name')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') is-invalid @enderror">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    @error('email')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group @error('password') is-invalid @enderror">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="password">
                                    @error('password')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group @error('password konfirmasi') is-invalid @enderror">
                                    <label for="password">Password Konfirmasi</label>
                                    <input type="password" class="form-control" id="password_confirmasi"
                                        name="password_confirmasi">
                                    @error('password')
                                        <div for="Password" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" name="agree" class="custom-control-input"
                                            id="agree">
                                        <label class="custom-control-label" for="agree">Saya setuju dengan syarat
                                            dan ketentuan.</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">
                                        Registrasi
                                    </button>
                                    <div class="mt-5 text-muted text-center">
                                        Sudah Memiliki Akun? <a href="{{ url('/login') }}">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; DLH SURAKARTA 2022
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>')}}
    <script src="{{ asset('template/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template/assets/js/page/auth-register.js') }}"></script>
</body>

</html>
