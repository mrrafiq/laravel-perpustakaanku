@extends('layouts/main')
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <p class="fs-1">{{ $title }}</p>
    <p class="fs-6 text-muted">Silahkan isi form berikut untuk menambahkan buku!</p>
    @if($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <form action="{{ route('postBorrow') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Nomor Unik</label>
                    <input type="text" required class="form-control" id="number" name="unique_num" placeholder="Nomor Unik....">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" required class="form-control typeahead" id="title" name="title" placeholder="Judul Buku....">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </div>
    </form>
    <script>
        var path = "{{ route('autoCompleteBook') }}";
        $('input.typeahead').typeahead({
            source: function(terms, process) {
                return $.get(path, {
                    terms: terms
                }, function(book) {
                    return process(book);
                });
            }
        });

        var path = "{{ route('autoCompleteUniqueNum') }}";
        $('input.typeahead').typeahead({
            source: function(terms, process) {
                return $.get(path, {
                    terms: terms
                }, function(member) {
                    return process(member);
                });
            }
        });
    </script>
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