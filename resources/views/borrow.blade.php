@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">{{ $message }}</p>
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('findBorrow') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" placeholder="Cari apapun...." name="search" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 text-end">
            <button class="btn btn-primary"><a class="text-decoration-none text-light"
                    href="{{ route('addBorrow') }}"><i class="fa fa-plus"></i> Tambah</a></button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8">
            <!-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-success"><a href="{{ route('hasReturned') }}"
                        class="text-decoration-none text-light">Sudah
                        Dikembalikan</a> </button>
                <button type="button" class="btn btn-danger"><a href="{{ route('hasNotReturned') }}"
                        class="text-decoration-none text-light">Belum Dikembalikan</a></button>
            </div> -->
            <p class="fs-6">Status : <span><a href="{{ route('hasReturned') }}"
                        class="text-decoration-none text-success">Sudah
                        Dikembalikan</a></span> | <a href="{{ route('hasNotReturned') }}"
                    class="text-decoration-none text-danger">Belum Dikembalikan</a></p>
        </div>
    </div>
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
    <div>
        <table class="table table-striped table-hover mb-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                use Carbon\Carbon;
            foreach($borrows as $borrow): ?>
                <tr>
                    <th scope="row">{{ $borrow->id }}</th>
                    <td>{{ $borrow->member->name }}</td>
                    <td>{{ $borrow->book->title }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        <?php
                            if($borrow->status == 0){
                                $return_date = $borrow->return_date;
                                $now = Carbon::now();
                                $fine = (int)($now->diffInDays($return_date, false));
                                if($fine < 0){
                                    $total = abs(($fine)*500);
                                }elseif($fine >= 0) {
                                    $total = 0;
                                }
                                echo "$total";
                            }else {
                                echo "$borrow->fine";
                            }
                        ?>
                    </td>
                    <td>{{ ($borrow->status == 0 ) ? "Belum Dikembalikan" : "Sudah Dikembalikan" }}
                    </td>
                    <td class="text=center">
                        <a href="{{ url('borrow/edit-borrow/'.$borrow->id) }}"><i
                                class="fa fa-pencil text-warning {{ ($borrow->status == 1) ? 'visually-hidden' : '' }}"></i></a>
                        <form action="{{ url('borrow/book-return/'.$borrow->id) }}"
                            class="d-inline" onsubmit="return confirm('Apakah anda yakin menyelesaikan peminjaman?');"
                            method="post">
                            @csrf
                            @method('post')
                            <button
                                class="btn btn-sm {{ ($borrow->status == 1) ? 'visually-hidden' : '' }}"
                                type="submit"><i class="bi bi-check-square ms-2 text-success"></i></button>
                        </form>

                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <div class="mb-5">
            Halaman : {{ $borrows->currentPage() }} <br>
            Jumlah Data : {{ $borrows->total() }}
            <div class=" pull-right">
                {{ $borrows->links() }}
            </div>
        </div>
    </div>

</main>
@endsection
