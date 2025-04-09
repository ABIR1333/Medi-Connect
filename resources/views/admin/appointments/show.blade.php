<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Appointment Details') }}
            </h2>
            <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Appointment Information</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Date:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->appointment_date->format('F d, Y') }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Time:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->appointment_time }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Status:</span>
                                        <p class="mt-1">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($appointment->status === 'completed') bg-green-100 text-green-800 
                                                @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800 
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Notes:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->notes ?? 'No notes available' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @if(auth()->user()->role === 'medecin')
                                <div class="mt-6">
                                    <button @click="$dispatch('open-modal', {content: document.getElementById('update-appointment-form').innerHTML})" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Update Appointment
                                    </button>
                                </div>
                            @endif
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Patient Information</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Name:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->patient->name }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Email:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->patient->email }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Phone:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->patient->phone ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-500">Address:</span>
                                        <p class="mt-1 text-sm text-gray-900">{{ $appointment->patient->address ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @if(auth()->user()->role === 'medecin')
                                <div class="mt-6">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Doctor Information</h3>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <span class="text-sm font-medium text-gray-500">Name:</span>
                                                <p class="mt-1 text-sm text-gray-900">Dr. {{ $appointment->medecin->name }}</p>
                                            </div>
                                            <div>
                                                <span class="text-sm font-medium text-gray-500">Specialty:</span>
                                                <p class="mt-1 text-sm text-gray-900">{{ $appointment->medecin->specialite->name ?? 'N/A' }}</p>
                                            </div>
                                            <div>
                                                <span class="text-sm font-medium text-gray-500">Email:</span>
                                                <p class="mt-1 text-sm text-gray-900">{{ $appointment->medecin->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hidden update form -->
    <div id="update-appointment-form" class="hidden">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Update Appointment Status</h3>
            <form action="{{ route('appointments.update-status', $appointment) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                        <option value="scheduled" {{ $appointment->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <textarea name="notes" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $appointment->notes }}</textarea>
                </div>
                
                <div class="flex justify-end">
                    <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

