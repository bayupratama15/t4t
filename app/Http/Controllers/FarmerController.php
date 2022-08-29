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
        return view('Farmers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Farmers $farmers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmers $farmers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmers  $farmers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmers $farmers)
    {
        //
    }
}
