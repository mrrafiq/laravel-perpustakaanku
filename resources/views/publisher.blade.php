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
        <div class="col-md-5 text-end">
            <button class="btn btn-primary"><a class="text-decoration-none text-light"
                    href="{{ route('addPublisher') }}"><i class="fa fa-plus"></i>
                    Tambah</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nama Penerbit</th>
                        <th scope='col'>Alamat</th>
                        <th scope='col'>Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $data):  ?>
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ url('book/publisher/edit-publisher/'.$data->id) }}"><i
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
