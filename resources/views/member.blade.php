@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $head }}</p>
    <p class="fs-6 text-muted">
        {{ $message }}
    </p>
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('findMember') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search"
                        placeholder="Cari nama anggota.." />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 text-end">
            <button class="btn btn-primary"><a class="text-decoration-none text-light"
                    href="{{ route('addMember') }}"><i class="fa fa-plus"></i> Tambah</a></button>
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
                <th scope="col">Nomor Unik</th>
                <th scope="col">Nama</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
          foreach($member as $member): ?>
            <tr>
                <th scope="row">{{ $member->unique_num }}</th>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->address }}</td>
                <td>
                    <a href="{{ url('members/edit-member/'.$member->id) }}"><i
                            class="fa fa-pencil text-warning"></i></a>
                    <form action="{{ url('members/delete-member/'.$member->id) }}"
                        onsubmit="return confirm('Apakah anda yakin menghapus data?');" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm" type="submit"><i class="ms-3 fa fa-trash text-danger"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <!-- <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link " href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item " aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->
</main>
@endsection
