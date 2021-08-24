@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk menambahkan kategori!</p>
    <form action="{{ route('postCategory') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name='id' id='id'>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" required class="form-control" id="name" name="name"
                        placeholder="Nama Kategori....">
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
