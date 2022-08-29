<?php

namespace App\Http\Controllers;

use App\Models\Farmers;

use Illuminate\Http\Request;

class FarmerController extends Controller
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
        $data = Farmers::latest()->paginate(5);
        return view('farmers.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Farmers.create');
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
            'name_farmers' => 'required',
        ]);

        Farmers::create($request->all());
        return redirect()->route('farmers.index')
            ->with('success', 'Data Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function show(Farmers $farmers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farmers = Farmers::findOrFail($id);

        return view('farmers.edit', [
            'farmers' => $farmers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_farmers' => 'required',
        ]);
        Farmers::find($id)->update($request->all());

        return redirect()->route('farmers.index')
            ->with('success', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Farmers::find($id)->delete();
        return back()->with('success', 'Data berhasil terhapus');
    }
}
