@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada Error di inputan anda<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('farmers.update',$farmers->id) }}" class="needs-validation"
                novalidate="">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit</h4>
                    </div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label>Nama Petani</label>
                            <input type="text" name="name_farmers" class="form-control"
                                value="{{ $farmers->name_farmers }}" required>
                            <div class="invalid-feedback">
                                Masukan Nama Anda
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label>Alamat Petani</label>
                            <textarea name="address_farmers"
                                class="form-control">{{ $farmers->address_farmers }}</textarea>

                            <div class="invalid-feedback">
                                Masukan Alamat Anda
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-1">
                        <button class="btn btn-primary">Save Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection