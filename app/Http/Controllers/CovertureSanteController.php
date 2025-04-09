<?php

namespace App\Http\Controllers;

use App\Models\CovertureSante;
use Illuminate\Http\Request;

class CovertureSanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $covertures = CovertureSante::all();
        return view('admin.coverture-sante.index',compact('covertures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CovertureSante::create([
            'coverture'=>strtoupper($request->coverture)
        ]);
        return redirect(route('covertures-sante.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CovertureSante $covertureSante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CovertureSante $covertureSante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CovertureSante $covertureSante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CovertureSante::find($id)->delete();
        return redirect(route('covertures-sante.index'));
    }
}
