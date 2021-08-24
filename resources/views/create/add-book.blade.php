@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">Tambah Buku</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk menambahkan buku!</p>
    <form action="{{ route('postBook') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <input type="hidden" name='id' id='id'>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" required class="form-control" id="title" name="title"
                        placeholder="Judul Buku....">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" name="category_id" id="category">
                        @foreach($categories as $key => $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Pengarang</label>
                    <select class="form-select" name="author_id" id="author">
                        @foreach($authors as $key => $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Penerbit</label>
                    <select class="form-select" name="publisher_id" id="publisher">
                        @foreach($publishers as $key => $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Tahun Terbit</label>
                    <input type="number" required class="form-control" id="year" name="year" placeholder="Tahun....">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" required class="form-control" id="stock" name="stock" placeholder="Stok....">
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
