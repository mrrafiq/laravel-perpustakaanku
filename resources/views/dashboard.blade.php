@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-5 text-muted">{{ $message }} <strong>{{ Auth::user()->name }}</strong>!</p>
    <hr>
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <p class="fs-6 text-dark text-center">Jumlah Anggota Terdaftar</p>
                </div>
                <div class="card-body">
                    <p class="fs-3 text-center fw-bold text-dark">
                        {{ $member_total }}
                    </p>
                    <p class="text-center fs-4 text-dark">
                        Orang
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <p class="fs-6 text-dark text-center">Jumlah Judul Buku</p>
                </div>
                <div class="card-body">
                    <p class="fs-3 text-center fw-bold text-dark">
                        {{ $book_total }}
                    </p>
                    <p class="text-center fs-4 text-dark">
                        Judul Buku
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <p class="fs-6 text-dark text-center">Jumlah Record Peminjaman</p>
                </div>
                <div class="card-body">
                    <p class="fs-3 text-center fw-bold text-dark">
                        {{ $borrow_total }}
                    </p>
                    <p class="text-center fs-4 text-dark">
                        Data
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <p class="fs-6 text-dark text-center">Judul Buku Terfavorit</p>
                </div>
                <div class="card-body">
                    <p class="fs-3 text-center fw-bold text-dark">
                        {{ $book_favorite_data }}
                    </p>
                    <p class="text-center fs-4 text-dark">
                        Data
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="{{ asset('/assets/dashboard.js') }}"></script>

@endsection
