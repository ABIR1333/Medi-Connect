<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReceptionViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reception.dashboard');
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
        $patient = Patient::firstOrCreate(
            ['cin' => $request->cin],
            [
                'cin' => $request->cin,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'sexe' => $request->sexe ? 'Homme' : 'Femme',
                'adresse' => $request->adresse,
                'ville' => $request->ville,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date_naissance,
                'coverture_sante_id' => $request->coverture_sante_id ? $request->coverture_sante_id : null,
                'identifiant' => $request->identifiant ? $request->identifiant : null
            ]
        );

        Appointment::create([
            'date_appointment'=>$request->date_appointment,
            'etat_appointment_id' => 1,
            'patient_id' => $patient->id,
            'user_id' => $request->user_id,
            'observation' => $request->observation,
            'controle' => !$request->controle,
        ]);

        return redirect()->route('reception.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
