@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk mengubah data pengarang!</p>
    <form action="{{ route('updateAuthor') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name='id' id='id' value="{{ $data->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" required class="form-control" id="name" name="name"
                        placeholder="Nama Kategori...." value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label for="born_date" class="form-label">Kelahiran</label>
                    <input type="date" required class="form-control" id="born_date" name="born_date"
                        value="{{ $data->born_date }}">
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
