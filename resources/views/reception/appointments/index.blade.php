<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Appointments') }}
            </h2>
            <button type="button" @click="$dispatch('open-modal', {content: document.getElementById('create-appointment-form').innerHTML})" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Appointment
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <label for="status-filter" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="status-filter" onchange="window.location.href='{{ route('reception.appointments.index') }}?status='+this.value" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">All Status</option>
                                        <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="date-filter" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" id="date-filter" value="{{ request('date') }}" onchange="window.location.href='{{ route('reception.appointments.index') }}?date='+this.value" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                </div>
                                <div>
                                    <label for="service-filter" class="block text-sm font-medium text-gray-700">Specialty</label>
                                    <select id="service-filter" onchange="window.location.href='{{ route('reception.appointments.index') }}?service='+this.value" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">All Specialties</option>
                                        @foreach(\App\Models\Service::orderBy('nom')->get() as $service)
                                            <option value="{{ $service->id }}" {{ request('service') == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="relative">
                                <form action="{{ route('reception.appointments.index') }}" method="GET" class="flex items-center">
                                    <input type="text" name="search" placeholder="Search patients or doctors..." value="{{ request('search') }}" class="border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm pr-10">
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
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->appointment_date->format('M d, Y') }}</div>
                                            <div class="text-sm text-gray-500">{{ $appointment->appointment_time }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $appointment->patient->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">Dr. {{ $appointment->medecin->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $appointment->medecin->specialite->name ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($appointment->status === 'completed') bg-green-100 text-green-800 
                                                @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800 
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button @click="$dispatch('open-modal', {content: document.getElementById('edit-appointment-{{ $appointment->id }}').innerHTML})" class="text-teal-600 hover:text-teal-900 mr-3">Edit</button>
                                            <a href="{{ route('reception.appointments.show', $appointment) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                            <button @click="$dispatch('open-modal', {content: document.getElementById('delete-appointment-{{ $appointment->id }}').innerHTML})" class="text-red-600 hover:text-red-900">Cancel</button>
                                            
                                            <!-- Hidden edit form -->
                                            <div id="edit-appointment-{{ $appointment->id }}" class="hidden">
                                                <div class="p-6">
                                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Appointment</h3>
                                                    <form action="{{ route('reception.appointments.update', $appointment) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid grid-cols-1 gap-4 mb-4">
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Patient</label>
                                                                <select name="patient_id" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                                                    @foreach(\App\Models\User::where('role', 'patient')->orderBy('name')->get() as $patient)
                                                                        <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                                                            {{ $patient->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Doctor</label>
                                                                <select name="medecin_id" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                                                    @foreach(\App\Models\User::where('role', 'medecin')->orderBy('name')->get() as $medecin)
                                                                        <option value="{{ $medecin->id }}" {{ $appointment->medecin_id == $medecin->id ? 'selected' : '' }}>
                                                                            Dr. {{ $medecin->name }} ({{ $medecin->specialite->name ?? 'N/A' }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                                                <input type="date" name="appointment_date" required value="{{ $appointment->appointment_date->format('Y-m-d') }}" min="{{ date('Y-m-d') }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                                                                <input type="time" name="appointment_time" required value="{{ $appointment->appointment_time }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                                                <select name="status" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                                                    <option value="scheduled" {{ $appointment->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                                    <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                                    <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                                                <textarea name="notes" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $appointment->notes }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex justify-end">
                                                            <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                                                Update Appointment
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            <!-- Hidden delete confirmation -->
                                            <div id="delete-appointment-{{ $appointment->id }}" class="hidden">
                                                <div class="p-6">
                                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Cancel Appointment</h3>
                                                    <p class="mb-4 text-sm text-gray-600">Are you sure you want to cancel this appointment?</p>
                                                    <form action="{{ route('reception.appointments.cancel', $appointment) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-4">
                                                            <label class="block text-sm font-medium text-gray-700 mb-2">Cancellation Reason</label>
                                                            <textarea name="notes" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Please provide a reason for cancellation"></textarea>
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                                                                Back
                                                            </button>
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                Cancel Appointment
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
                    
                    <div class="mt-4">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hidden create form -->
    <template id="create-appointment-form">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Schedule New Appointment</h3>
            <form action="{{ route('reception.appointments.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Patient</label>
                        <select name="patient_id" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            <option value="">Select Patient</option>
                            @foreach(\App\Models\User::where('role', 'patient')->orderBy('name')->get() as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Specialty</label>
                        <select id="specialite_id" name="specialite_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            <option value="">All Specialties</option>
                            @foreach(\App\Models\Specialite::orderBy('name')->get() as $specialite)
                                <option value="{{ $specialite->id }}">{{ $specialite->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Doctor</label>
                        <select name="medecin_id" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            <option value="">Select Doctor</option>
                            @foreach(\App\Models\User::where('role', 'medecin')->orderBy('name')->get() as $medecin)
                                <option value="{{ $medecin->id }}" data-specialite="{{ $medecin->specialite_id }}">Dr. {{ $medecin->name }} ({{ $medecin->specialite->name ?? 'N/A' }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" name="appointment_date" required min="{{ date('Y-m-d') }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                        <input type="time" name="appointment_time" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                        <textarea name="notes" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Schedule Appointment
                    </button>
                </div>
            </form>
        </div>
    </template>
    
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const specialtySelect = document.getElementById('specialite_id');
                const doctorSelect = document.querySelector('select[name="medecin_id"]');

                specialtySelect.addEventListener('change', function () {
                    const selectedSpecialty = this.value;

                    // Reset doctor options
                    doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

                    // Filter and add doctor options based on selected specialty
                    document.querySelectorAll('select[name="medecin_id"] > option').forEach(option => {
                        if (option.dataset.specialite === selectedSpecialty || selectedSpecialty === '') {
                            doctorSelect.appendChild(option);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>

