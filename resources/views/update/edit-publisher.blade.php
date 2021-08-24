@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk mengubah data penerbit!</p>
    <form action="{{ route('updatePublisher') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name='id' id='id'>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Penerbit</label>
                    <input type="text" required class="form-control" id="name" name="name"
                        placeholder="Nama Penerbit...." value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"
                        placeholder="Alamat Penerbit....">{{ $data->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Nama Penerbit</label>
                    <input type="email" required class="form-control" id="email" name="email"
                        placeholder="Email Penerbit...." value="{{ $data->email }}">
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
