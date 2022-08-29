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
            <form method="POST" action="{{ route('land_spreadings.update',$landSpreading->id) }}"
                class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit</h4>
                    </div>
                    <div class="card-body pb-0">
                        @php
                        $dataFarmer = DB::table('farmers')->get();
                        @endphp
                        <div class="form-group">
                            <label>Nama Petani</label>
                            <select name="farmer_id" class="form-control">
                                @foreach ($dataFarmer as $items)
                                <option value="{{ $items->id }}" {{ ($landSpreading->farmer_id == $items->id)
                                    ? "selected" : "" }}>{{ $items->name_farmers }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Masukan Petani
                            </div>
                        </div>
                        <div class="form-group">
                            @php
                            $dataFields = DB::table('fields')->get();
                            @endphp
                            <label>Nama Lahan</label>
                            <select name="field_id" class="form-control">
                                @foreach ($dataFields as $items)
                                <option value="{{ $items->id }}" {{ ($landSpreading->field_id == $items->id)
                                    ? "selected" : "" }}>{{ $items->name_fields }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Masukan Lahan
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