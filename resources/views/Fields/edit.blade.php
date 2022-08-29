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
            <form method="POST" action="{{ route('fields.update',$fields->id) }}" class="needs-validation"
                novalidate="">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit</h4>
                    </div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label>Nama Lahan</label>
                            <input type="text" name="name_fields" class="form-control"
                                value="{{ $fields->name_fields }}" required>
                            <div class="invalid-feedback">
                                Masukan Lahan Anda
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude_fields" class="form-control"
                                value="{{ $fields->latitude_fields }}" required>
                            <div class="invalid-feedback">
                                Masukan Latitude
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude_fields" class="form-control"
                                value="{{ $fields->longitude_fields }}" required>
                            <div class="invalid-feedback">
                                Masukan Longitude
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label>Alamat Petani</label>
                            <textarea name="address_fields"
                                class="form-control">{{ $fields->address_fields }}</textarea>

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