@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $head }}</p>
    <p class="text-muted fs-6">{{ $message }}</p>
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('findBook') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Cari judul buku.."
                        value="{{ old('search
                        ') }}" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 text-end">
            <button class="btn btn-primary"><a class="text-decoration-none text-light"
                    href="{{ route('addBook') }}"><i class="fa fa-plus"></i> Tambah</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-3 mb-3">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="/book/book-category">
                    <button class="btn btn-outline-danger "><i class="fa fa-list"></i>
                        Lihat Kategori
                    </button>
                </a>
                <a href="/book/author">
                    <button class="btn btn-outline-warning"><i class="bi bi-person-lines-fill"></i> Lihat
                        Pengarang
                    </button>
                </a>
                <a href="/book/publisher">
                    <button class="btn btn-outline-success"><i class="bi bi-collection"></i> Lihat
                        Penerbit
                    </button>
                </a>
            </div>
        </div>
        <br>
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            foreach($books as $book): ?>
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ url('book/edit-book/'.$book->id) }}"><i
                                class="fa fa-pencil text-warning"></i></a>
                        <form action="{{ url('book/delete-book/'.$book->id) }}"
                            onsubmit="return confirm('Apakah anda yakin menghapus data?');" class="d-inline"
                            method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm" type="submit"><i
                                    class="ms-3 fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="mb-5">
            Halaman : {{ $books->currentPage() }} <br>
            Jumlah Data : {{ $books->total() }} <br>
            <div class=" pull-right">
                {{ $books->links() }}
            </div>
        </div>
</main>
@endsection
