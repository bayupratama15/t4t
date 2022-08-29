@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header">
            Tambah Data Petani
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('farmers.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="country_name">Nama Petani:</label>
                    <input type="text" class="form-control" name="name_farmers" />
                </div>
                <div class="form-group mt-1">
                    <label for="cases">Alamat Petani :</label>
                    <textarea class="form-control" name="address_farmers"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection