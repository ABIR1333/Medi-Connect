{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Appointments') }}
        </h2>
    </x-slot> --}}
    @extends('admin.layout.app')
@section('mini title')
<h2 class="text-base font-semibold text-gray-800">
    <i class="fas fa-notes-medical text-blue-500"></i>
    Liste des rendez-vous  :
</h2>
@endsection
@section('content')
    <div>
        <div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <label for="status-filter" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="status-filter" onchange="window.location.href='{{ route('appointments.index') }}?status='+this.value" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">All Status</option>
                                        <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="date-filter" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" id="date-filter" value="{{ request('date') }}" onchange="window.location.href='{{ route('appointments.index') }}?date='+this.value" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class="relative">
                                <form action="{{ route('appointments.index') }}" method="GET" class="flex items-center">
                                    <input type="text" name="search" placeholder="Search patients..." value="{{ request('search') }}" class="border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm pr-10">
                                    <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->date_appointment->format('M d, Y') }}</div>
                                            {{-- <div class="text-sm text-gray-500">{{ $appointment->appointment_time }}</div> --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->nom }}</div>
                                            {{-- <div class="text-sm text-gray-500">{{ $appointment->patient->email }}</div> --}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($appointment->status === 'completed') bg-green-100 text-green-800 
                                                @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800 
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($appointment->status) }}
                                            </span> --}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">{{ Str::limit($appointment->notes, 50) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button @click="$dispatch('open-modal', {content: document.getElementById('update-appointment-{{ $appointment->id }}').innerHTML})" class="text-teal-600 hover:text-teal-900 mr-3">Update</button>
                                            <a href="{{ route('appointments.show', $appointment) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                            
                                            <!-- Hidden update form -->
                                            <div id="update-appointment-{{ $appointment->id }}" class="hidden">
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
                                        </td>
                                    </tr>
                                @endforeach
                                @if($appointments->count() === 0)
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No appointments found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- <div class="mt-4">
                        {{ $appointments->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- </x-app-layout> --}}

