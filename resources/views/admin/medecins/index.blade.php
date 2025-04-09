@extends('admin.layout.app')
@section('mini title')
<h2 class="text-base font-semibold text-gray-800">
    <i class="fa-solid fa-user-md text-indigo-600 mr-3"></i>
    Liste des Médecins :
</h2>
@endsection
@section('content')

    <!-- En-tête avec bouton d'ajout -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6 flex justify-between items-center">
        
        <a href="{{ route('medecins.create') }}">
            <button class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-lg text-sm transition duration-300 shadow-md">
                Ajouter un Médecin
            </button>
        </a>
    </div>

    <!-- Tableau des médecins -->
    <div class="relative overflow-hidden shadow-lg rounded-lg bg-white p-6">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-4">Code</th>
                    <th class="px-6 py-4">Nom</th>
                    <th class="px-6 py-4">Prénom</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Téléphone</th>
                    <th class="px-6 py-4">Service</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medecins as $medecin)
                    <tr class="border-b hover:bg-gray-50 transition duration-300">
                        <td class="px-6 py-4">{{ $medecin->code }}</td>
                        <td class="px-6 py-4">{{ $medecin->nom }}</td>
                        <td class="px-6 py-4">{{ $medecin->prenom }}</td>
                        <td class="px-6 py-4">{{ $medecin->email }}</td>
                        <td class="px-6 py-4">{{ $medecin->telephone }}</td>
                        <td class="px-6 py-4">{{ $medecin->service->service }}</td>
                        <td class="px-6 py-4 text-center flex justify-center space-x-2">
                            <a href="{{ route('medecins.show', $medecin->id) }}">
                                <button class="bg-cyan-500 hover:bg-cyan-400 text-white px-3 py-2 rounded-md text-xs shadow-md">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </a>
                            <a href="{{ route('medecins.edit', $medecin->id) }}">
                                <button class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-2 rounded-md text-xs shadow-md">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <form action="{{ route('medecins.destroy', $medecin->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded-md text-xs shadow-md" onclick="confirmDelete()">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
