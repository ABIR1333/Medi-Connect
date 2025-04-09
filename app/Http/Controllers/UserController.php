<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('admin.users.index', compact('users')); // Retourne la vue avec les utilisateurs
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create'); // Retourne la vue de création
    }
    
    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Création de l'utilisateur
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    // Redirige vers la liste des utilisateurs
    return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
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
