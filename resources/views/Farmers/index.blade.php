@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-4">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ $message }}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-action">
                                <a href="{{ route('farmers.create') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Petani</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">
                                                {{ $value->name_farmers }}
                                            </td>
                                            <td class="text-center">
                                                {{ $value->address_farmers }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="{{ route('farmers.destroy',$value->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-12 mt-1 ">
                                                            <a href="{{ route('farmers.edit',$value->id) }}"
                                                                class="btn btn-primary btn-action  btn-sm"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Edit">Edit</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer text-right">
                                    {{-- PAGGINATION --}}
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    @endsection