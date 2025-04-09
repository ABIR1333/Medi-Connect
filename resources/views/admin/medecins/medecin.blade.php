@extends('admin.layout.app')
@section('mini title')
<p>medecin</p>
@endsection
@section('content')
    <div class="bg-white shadow-md rounded-lg min-h-[calc(100dvh-120px)] px-10 py-8 max-w-2xl mx-auto mt-10 border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-blue-500 pb-3">Informations du Médecin</h2>
        <div class="space-y-5 text-gray-800">
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Code :</span>
                <span class="text-gray-900 text-lg">{{$medecin->code}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Nom :</span>
                <span class="text-gray-900 text-lg">{{$medecin->nom}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Prénom :</span>
                <span class="text-gray-900 text-lg">{{$medecin->prenom}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Email :</span>
                <span class="text-gray-900 text-lg">{{$medecin->email}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Téléphone :</span>
                <span class="text-gray-900 text-lg">{{$medecin->telephone}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Spécialité :</span>
                <span class="text-gray-900 text-lg">{{$medecin->service->service}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-lg text-gray-700">Jours :</span>
                <div class="flex flex-wrap gap-2">
                    @forelse ($medecin->jours as $jour)
                        <span class="bg-gray-800 text-white text-sm font-medium px-3 py-1 rounded-full">{{$jour->jour}}</span>
                    @empty
                        <span class="text-gray-500">Non spécifié</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection