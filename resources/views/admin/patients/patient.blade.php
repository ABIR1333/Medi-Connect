@extends('admin.layout.app')
@section('mini title', 'Patient')
@section('content')
    <div class="bg-white shadow-md rounded-lg min-h-[calc(100dvh-120px)] px-10 py-8 max-w-2xl mx-auto mt-10 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b-4 border-blue-500 pb-3">Informations du Patient</h2>
        <div class="space-y-4 text-gray-800 text-sm">
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">CIN :</span>
                <span class="text-gray-900">{{$patient->cin}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Nom :</span>
                <span class="text-gray-900">{{$patient->nom}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Prénom :</span>
                <span class="text-gray-900">{{$patient->prenom}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Date de Naissance :</span>
                <span class="text-gray-900">{{$patient->date_naissance}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Adresse :</span>
                <span class="text-gray-900">{{$patient->adresse}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Ville :</span>
                <span class="text-gray-900">{{$patient->ville}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Téléphone :</span>
                <span class="text-gray-900">{{$patient->telephone}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Sexe :</span>
                <span class="text-gray-900">{{$patient->sexe}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Couverture Santé :</span>
                <span class="text-gray-900">{{$patient->coverture_sante_id?$patient->covertureSante->coverture:'no coverture'}}</span>
            </div>
            <div class="flex items-center justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Identifiant :</span>
                <span class="text-gray-900">{{$patient->identifiant?$patient->identifiant:'no identifiant'}}</span>
            </div>
        </div>
    </div>
@endsection