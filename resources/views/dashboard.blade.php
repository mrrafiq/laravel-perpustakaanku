@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-5 text-muted">{{ $message }} <strong>{{ Auth::user()->name }}</strong>!</p>
    <hr>
    <div class="row mb-5">
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
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 20rem;">
                <div class="card-header">
                    <p class="fs-6 text-dark text-center">Buku Favorit</p>
                </div>
                <div class="card-body">
                    <p class="fs-3 text-center fw-bold text-dark">
                        {{ $book_favorite->title }}
                    </p>
                    <p class="text-center fs-6 text-dark">
                        Dipinjam sebanyak <span class="fw-bold">{{ $book_favorite_total->total }}</span> buku.
                    </p>   
                </div>
            </div>
        </div>
    </div>

    @include('chart')
</main>

<script src="{{ asset('/assets/dashboard.js') }}"></script>

@endsection