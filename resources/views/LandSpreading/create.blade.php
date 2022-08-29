@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header">
            Tambah Data Lahan
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
            <form method="post" action="{{ route('land_spreadings.store') }}">
                @csrf
                <div class="form-group">
                    @php
                    $dataFarmer = DB::table('farmers')->get();
                    @endphp
                    <label for="farmer_id">Nama Petani:</label>
                    <select name="farmer_id" class="form-control">
                        @foreach ($dataFarmer as $items)
                        <option value="{{ $items->id }}">{{ $items->name_farmers }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @php
                    $dataFields = DB::table('fields')->get();
                    @endphp
                    <label for="country_name">Lahan:</label>
                    <select name="field_id" class="form-control">
                        @foreach ($dataFields as $items)
                        <option value="{{ $items->id }}">{{ $items->name_fields }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection