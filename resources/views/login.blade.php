<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login - PerpustakaanKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('/assets/login.css') }}" />
</head>

<body class="bg-light">
    <main>
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <img src="{{ asset('/assets/icon/reading.jpg') }}" alt=""
                            class="login-card-img" />
                    </div>
                    <div class="col-md-7">
                        <div class="card-body content-body">
                            <div>
                                <p class="fs-1">
                                    <img src="../icon/open-book.png" alt="" width="50px" class="mt-0" />
                                    PerpustakaanKu
                                </p>
                                <p class="text-muted fs-5">
                                    Sistem Informasi Peminjaman Buku Perpustakaan
                                </p>
                            </div>
                            <hr />
                            <div>
                                <form action="{{ route('postlogin') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control form-login" id="username" name="username"
                                            placeholder="Username...." />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Password</label>
                                        <input type="password" class="form-control form-login" id="password"
                                            name="password" placeholder="Password...." />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>

                                    </div>
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
