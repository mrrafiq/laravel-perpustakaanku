@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <p class="fs-1">{{ $title }}</p>
        <p class="fs-6 text-muted">Silahkan isi form berikut untuk menammbahkan buku!</p>
        <form action="#" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name='id' id='id'>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Peminjam</label>
                        <input type="text" required class="form-control" id="nama" name="nama" placeholder="Nama....">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" required class="form-control" id="judul" name="judul"
                            placeholder="Judul Buku....">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </div>
        </form>
    </main>
@endsection