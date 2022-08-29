<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Field::latest()->paginate(5);
        return view('fields.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_fields' => 'required',
            'latitude_fields' => 'required',
            'longitude_fields' => 'required',
            'address_fields' => 'required',
        ]);
        Field::create($request->all());
        return redirect()->route('fields.index')
            ->with('success', 'Data Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::findOrFail($id);

        return view('fields.edit', [
            'fields' => $field
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $request->validate([
            'name_fields' => 'required',
            'latitude_fields' => 'required',
            'longitude_fields' => 'required',
            'address_fields' => 'required',
        ]);
        Field::find($field->id)->update($request->all());
        return redirect()->route('fields.index')
            ->with('success', 'Data Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Field::find($id)->delete();
        return redirect()->route('fields.index')
            ->with('success', 'Data Berhasil dihapus.');
    }
}
