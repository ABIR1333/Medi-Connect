<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public static $villes = [
        "Agadir",
        "Al Hoceima",
        "Azilal",
        "Beni Mellal",
        "Berkane",
        "Bouznika",
        "Casablanca",
        "Chtouka Ait Baha",
        "Dakhla",
        "El Jadida",
        "Errachidia",
        "Fes",
        "Ifrane",
        "Imilchil",
        "Khenifra",
        "Kenitra",
        "Laâyoune",
        "Marrakech",
        "Meknes",
        "Nador",
        "Ouarzazate",
        "Oujda",
        "Rabat",
        "Safi",
        "Selouane",
        "Sidi Ifni",
        "Taza",
        "Tétouan",
        "Taroudant",
        "Tiznit",
        "Tangier",
        "Zagora"
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all(); // Récupère tous les patients
        return view('admin.patients.index', compact('patients')); // Retourne la vue avec les patients
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = $this->villes;
        return view('admin.patients.create',compact('villes')); // Retourne la vue de création
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cin'=>['required',Rule::unique(Patient::class)],
        ]);

        Patient::create([
            'cin'=>$request->cin,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe?'Homme':'Femme',
            'adresse'=>$request->adresse,
            'ville'=>$request->ville,
            'telephone'=>$request->telephone,
            'date_naissance'=>$request->date_naissance,
            'coverture_sante_id'=>$request->coverture_sante_id ? $request->coverture_sante_id : null,
            'identifiant'=>$request->identifiant ? $request->identifiant : null
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        return view('admin.patients.patient',compact('patient'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $villes = $this->villes;
        $patient = Patient::find($id);
        return view('admin.patients.modify', compact('patient','villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'cin'=>['required',Rule::unique(Patient::class)->ignore($id)]
        ]);

        $patient = Patient::find($id);

        $patient->update([
            'cin'=>$request->cin,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe?'Homme':'Femme',
            'adresse'=>$request->adresse,
            'ville'=>$request->ville,
            'telephone'=>$request->telephone,
            'date_naissance'=>$request->date_naissance,
            'coverture_sante_id'=>$request->coverture_sante_id ? $request->coverture_sante_id : $patient->coverture_sante_id,
            'identifiant'=>$request->identifiant ? $request->identifiant : $patient->identifiant
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}

