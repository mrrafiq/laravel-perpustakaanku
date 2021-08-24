@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $head }}</p>
    <p class="text-muted fs-6">{{ $message }}</p>
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
    <br>
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-2 text-end">
            <button class="btn btn-primary"><a class="text-decoration-none text-light"
                    href="{{ route('addCategory') }}"><i class="fa fa-plus"></i>
                    Tambah</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $data):  ?>
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a
                                href="{{ url('book/book-category/edit-category/'.$data->id) }}"><i
                                    class="fa fa-pencil text-warning"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
@endsection
