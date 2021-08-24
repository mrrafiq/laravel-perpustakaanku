@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk mengubah data anggota!</p>
    @foreach($member as $member)
        <form action="{{ route('updateMember') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name='id' id='id' value="{{ $member->id }}">
                    <div class="mb-3">
                        <label for="unique_num" class="form-label">Nomor Unik</label>
                        <input type="text" name="unique_num" class="form-control" id="number" required
                            placeholder="1811082017" value="{{ $member->unique_num }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" required class="form-control" id="name" name="name" placeholder="Nama...."
                            value="{{ $member->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Handphone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="081234567890"
                            value="{{ $member->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" cols="30" rows="5"
                            class='form-control'>{{ $member->address }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </div>
        </form>
    @endforeach
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
