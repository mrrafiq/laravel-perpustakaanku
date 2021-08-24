@extends('layouts/main')
@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <p class="fs-1">Dashboard</p>
        <p class="fs-5 text-muted">Selamat Datang <strong>{{ Auth::user()->name }}</strong>!</p>
    </main>
@endsection