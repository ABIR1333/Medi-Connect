<?php

namespace App\Http\Controllers;

use App\Models\JoursMedecin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins = User::where('role_id','=',Role::where('role','=','medecin')->first()->id)->get(); // Récupère tous les médecins
        return view('admin.medecins.index', compact('medecins')); // Retourne la vue avec les médecins
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medecins.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'role_id' => Role::where('role','=','medecin')->first()->id,
            'service_id' => $request->service_id,
            'code' => $request->code,
        ]);

        foreach($request->jours as $jour){
            JoursMedecin::create([
                'user_id'=>$user->id,
                'jour'=>$jour,
            ]);
        }
        
        return redirect()->route('medecins.index')->with('success', 'Médecin créé avec succès.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medecin = User::find($id);
        return view('admin.medecins.medecin',compact('medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medecin = User::find($id);
        return view('admin.medecins.modify',compact('medecin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',Rule::unique(User::class)->ignore($id)],
            'password' => ['confirmed', Rules\Password::defaults()],
        ]);
        $user = User::find($id);
        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'telephone' => $request->telephone,
            'role_id' => Role::where('role','=','medecin')->first()->id,
            'service_id' => $request->service_id,
            'code' => $request->code,
        ]);

        JoursMedecin::where('user_id','=',$id)->delete();

        foreach($request->jour as $jour){
            JoursMedecin::create([
                'user_id'=>$id,
                'jour'=>$jour,
            ]);
        }
        
        
        return redirect()->route('medecins.index')->with('success', 'Médecin a ete Modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        JoursMedecin::where('user_id','=',$id)->delete();
        return redirect(route('medecins.index'))->with('success','medecin has been deleted successfully');
    }
}
