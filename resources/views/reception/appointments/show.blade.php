@extends('reception.layout.app')
@section('mini title')

@endsection
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header Section -->
        <div class="bg-teal-600 px-6 py-4 text-white">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Appointment Details</h1>
                <span class="px-3 py-1 bg-white bg-opacity-30 rounded-full text-sm font-semibold">
                    ID: {{ $appointment->id }}
                </span>
            </div>
        </div>

        <div class="p-6">
            <!-- Appointment Information Card -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                    <i class="fas fa-calendar-alt mr-2 text-teal-600"></i>Appointment Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Date & Time</p>
                        <p class="text-lg font-semibold">
                            {{ $appointment->date_appointment->format('l, F j, Y') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-8">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold" style="background-color:{{$appointment->etat_appointment->couleur}}">
                                {{ $appointment->etat_appointment->etat }}
                            </span>
                        </div>

                        <div >
                            <form action="{{ route('appointments.change-status', $appointment) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="flex items-center gap-3">
                                    <select name="etat_appointment_id"
                                            class="rounded border-gray-300 focus:border-teal-500 focus:ring focus:ring-teal-200">
                                        @foreach(\App\Models\EtatAppointment::all() as $status)
                                            <option value="{{ $status->id }}"
                                                {{ $appointment->etat_appointment_id == $status->id ? 'selected' : '' }}>
                                                {{ $status->etat }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit"
                                            class="px-3 py-1 bg-teal-600 text-white rounded hover:bg-teal-700 text-sm">
                                        Update Status
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">SUIVE</p>
                        <p class="text-lg">
                            @if($appointment->controle)
                                <span class="text-green-600"><i class="fas fa-times-circle"></i>Non</span>
                            @else
                                <span class="text-gray-500"><i class="fas fa-check-circle"></i>Oui</span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Observations</p>
                        <p class="text-lg">
                            {{ $appointment->observation ?? 'No observations recorded' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Patient Information Card -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                    <i class="fas fa-user-injured mr-2 text-blue-600"></i>Patient Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Full Name</p>
                        <p class="text-lg font-semibold">
                            {{ $appointment->patient->nom }} {{ $appointment->patient->prenom }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">CIN</p>
                        <p class="text-lg">{{ Str::upper($appointment->patient->cin) }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Date of Birth</p>
                        <p class="text-lg">
                            {{ \Carbon\Carbon::parse($appointment->patient->date_naissance)->format('m/d/Y') }}
                            (Age: {{ \Carbon\Carbon::parse($appointment->patient->date_naissance)->age }})
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Gender</p>
                        <p class="text-lg">{{ $appointment->patient->sexe }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Phone</p>
                        <p class="text-lg">{{ $appointment->patient->telephone }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Address</p>
                        <p class="text-lg">
                            {{ $appointment->patient->adresse }}, {{ $appointment->patient->ville }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Health Coverage</p>
                        <p class="text-lg">
                            {{ $appointment->patient->coverture->coverture ?? 'None' }}
                            @if($appointment->patient->identifiant)
                                (ID: {{ $appointment->patient->identifiant }})
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Doctor Information Card -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                    <i class="fas fa-user-md mr-2 text-purple-600"></i>Doctor Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Doctor Name</p>
                        <p class="text-lg font-semibold">
                            Dr. {{ $appointment->user->nom }} {{ $appointment->user->prenom }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Specialty</p>
                        <p class="text-lg">
                            {{ $appointment->user->service->service ?? 'General' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Email</p>
                        <p class="text-lg">{{ $appointment->user->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Phone</p>
                        <p class="text-lg">{{ $appointment->user->telephone }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('reception.dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection