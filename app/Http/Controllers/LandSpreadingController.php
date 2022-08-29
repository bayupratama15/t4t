<?php

namespace App\Http\Controllers;

use App\Models\LandSpreading;
use Illuminate\Http\Request;

class LandSpreadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LandSpreading::with('getDataFarmer', 'getDataField')->latest()->paginate(5);
        return view('LandSpreading.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LandSpreading.create');
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
            'field_id' => 'required',
            'farmer_id' => 'required',
        ]);
        LandSpreading::create($request->all());
        return redirect()->route('land_spreadings.index')
            ->with('success', 'Data Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandSpreading  $landSpreading
     * @return \Illuminate\Http\Response
     */
    public function show(LandSpreading $landSpreading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandSpreading  $landSpreading
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $landSpreading = LandSpreading::findOrFail($id);

        return view('LandSpreading.edit', [
            'landSpreading' => $landSpreading
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandSpreading  $landSpreading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandSpreading $landSpreading)
    {
        $request->validate([
            'field_id' => 'required',
            'farmer_id' => 'required',
        ]);
        $landSpreading->update($request->all());
        return redirect()->route('land_spreadings.index')
            ->with('success', 'Data Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandSpreading  $landSpreading
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LandSpreading::find($id)->delete();
        return redirect()->route('land_spreadings.index')
            ->with('success', 'Data Berhasil dihapus.');
    }
}
