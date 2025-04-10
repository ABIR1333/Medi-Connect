<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all()->sortByDesc('created_at');
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointments.create'); // Retourne la vue du formulaire de création
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Création du rendez-vous
        Appointment::create([
            'date_appointment' => $request->date_appointment,
            'etat_appointment_id' => 1,
            'patient_id' => $request->patient_id,
            'user_id' => $request->user_id,
            'observation' => $request->observation,
            'controle' => !$request->controle,
        ]);

        // Redirection vers la liste des rendez-vous avec un message de succès
        return redirect()->back()->with('success', 'Rendez-vous créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id); // Recherche le rendez-vous
        return view('appointments.show', compact('appointment')); // Retourne la vue avec les détails
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id); // Recherche le rendez-vous à modifier
        return view('appointments.edit', compact('appointment')); // Retourne la vue d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id); // Recherche le rendez-vous à mettre à jour

        // Validation des données
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Mise à jour du rendez-vous
        $appointment->update($validatedData);

        // Redirection vers la liste des rendez-vous avec un message de succès
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id); // Recherche le rendez-vous à supprimer
        $appointment->delete(); // Supprime le rendez-vous

        // Redirection vers la liste avec un message de succès
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }



    public function changeStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'etat_appointment_id' => 'required|exists:etat_appointments,id'
        ]);

        $appointment->update([
            'etat_appointment_id' => $request->etat_appointment_id
        ]);

        return back()->with('success', 'Appointment status updated successfully!');
    }
}
