@extends('admin.layout.app')
@section('mini title', 'Services')
@section('content')

    <!-- Formulaire d'ajout de spécialité -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fa-solid fa-stethoscope text-blue-600 mr-2"></i> Ajouter une Services
        </h2>
        <form action="{{ route('services.store') }}" method="POST" class="flex items-center space-x-4">
            @csrf
            <input type="text" name="service" placeholder="Nouvelle service..."
                class="w-full p-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />
            <input type="color" name="couleur" value="#000000" class="w-10 h-10 border border-gray-300 rounded-lg cursor-pointer">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-lg text-sm transition duration-300 shadow-md">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>
    </div>

    <!-- Tableau des spécialités -->
    <div class="relative overflow-hidden shadow-lg rounded-lg bg-white p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fa-solid fa-list text-blue-600 mr-2"></i> Liste des services
        </h2>
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left">service</th>
                    <th scope="col" class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr class="border-b hover:bg-gray-50 transition duration-300">
                        <!-- Spécialité avec badge coloré -->
                        <td class="px-6 py-4">
                            <span class="text-white text-base font-semibold px-4 py-2 rounded-lg shadow-md" style="background-color: {{ $service->couleur ? $service->couleur : 'black' }};">
                                {{ $service->service }}
                            </span>
                        </td>
                        <!-- Actions (Éditer & Supprimer) -->
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <!-- Supprimer -->
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded-md shadow-md text-xs transition duration-300">
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
