@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk menambahkan penerbit!</p>
    <form action="{{ route('postPublisher') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name='id' id='id'>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Penerbit</label>
                    <input type="text" required class="form-control" id="name" name="name"
                        placeholder="Nama Penerbit....">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"
                        placeholde="Alamat Penerbit...."></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Nama Penerbit</label>
                    <input type="email" required class="form-control" id="email" name="email"
                        placeholder="Email Penerbit....">
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
