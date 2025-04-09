@extends('admin.layout.app')
@section('mini title')
<h2 class="text-base font-semibold text-gray-800">
    <i class="fa-solid fa-user-nurse text-indigo-600 mr-3"></i>
    Liste des secrétaires médical(e)s :
</h2>
@endsection
@section('content')

    <!-- En-tête avec bouton d'ajout -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6 flex justify-between items-center">
        <a href="{{ route('receptions.create') }}">
            <button class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-lg text-sm transition duration-300 shadow-md">
                Ajouter un secrétaires médical(e)s
            </button>
        </a>
    </div>

    <!-- Tableau des secrétaires -->
    <div class="relative overflow-hidden shadow-lg rounded-lg bg-white p-6">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-4">Nom</th>
                    <th class="px-6 py-4">Prénom</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Téléphone</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receptions as $reception)
                    <tr class="border-b hover:bg-gray-50 transition duration-300">
                        <td class="px-6 py-4">{{ $reception->nom }}</td>
                        <td class="px-6 py-4">{{ $reception->prenom }}</td>
                        <td class="px-6 py-4">{{ $reception->email }}</td>
                        <td class="px-6 py-4">{{ $reception->telephone }}</td>
                        <td class="px-6 py-4 text-center flex justify-center space-x-2">
                            <a href="{{ route('receptions.edit', $reception->id) }}">
                                <button class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-2 rounded-md text-xs shadow-md">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <form action="{{ route('receptions.destroy', $reception->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded-md text-xs shadow-md">
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
