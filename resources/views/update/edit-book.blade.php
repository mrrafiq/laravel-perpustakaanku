@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">Tambah Buku</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk menammbahkan buku!</p>
    <form action="{{ route('updateBook') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <input type="hidden" name='id' id='id' value="{{ $book->id }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" required class="form-control" id="title" name="title"
                        placeholder="Judul Buku...." value="{{ $book->title }}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" name="category_id" id="category_id">
                        @foreach($categories as $key => $value)
                            <option value="{{ $value->id }}" @if($value->id == $book->category_id) echo selected
                        @endif>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Pengarang</label>
                    <input type="text" required class="form-control" id="author" name="author"
                        placeholder="Pengarang...." value="{{ $book->author->name }}">
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Penerbit...."
                        value="{{ $book->publisher->name }}">
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Tahun Terbit</label>
                    <input type="text" required class="form-control" id="year" name="year" placeholder="Tahun...."
                        value="{{ $book->year }}">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="text" required class="form-control" id="number" name="stock" placeholder="Stok...."
                        value="{{ $book->stock }}">
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
