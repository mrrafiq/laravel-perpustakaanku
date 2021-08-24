@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk mengubah data peminjaman!</p>
    @if($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('updateBorrow') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" name='id' id='id' value="{{ $borrow->id }}">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Nomor Unik</label>
                    <input type="text" required class="form-control" id="number" name="unique_num"
                        placeholder="Nomor Unik...." value="{{ $borrow->member->unique_num }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" required class="form-control" id="title" name="title"
                        placeholder="Judul Buku...." value="{{ $borrow->book->title }}">
                </div>
                <div class="mb-3">
                    <label for="return_date" class="form-label">Tanggal Kembali</label>
                    <input type="date" required class="form-control" id="return_date" name="return_date"
                        value="{{ $borrow->return_date }}">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </div>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>
@endsection
