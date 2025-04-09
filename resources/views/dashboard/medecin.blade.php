<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-teal-500 to-teal-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">les rendez-vous du jour</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\Appointment::where('user_id', auth()->id())->whereDate('date_appointment', today())->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Cette semmaine</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\Appointment::where('user_id', auth()->id())->whereBetween('date_appointment', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Totale Patients</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\Appointment::where('user_id', auth()->id())->distinct('patient_id')->count('patient_id') }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 min-h-[calc(100vh-20rem)]">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Today's Schedule</h3>
            <div x-data="{ date: '{{ now()->format('Y-m-d') }}' }" class="mb-4">
                <div class="flex items-center space-x-4">
                    <button @click="date = '{{ now()->subDay()->format('Y-m-d') }}'" class="p-2 rounded-full hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div class="text-lg font-medium text-gray-900" x-text="new Date(date).toLocaleDateString('en-US', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})"></div>
                    <button @click="date = '{{ now()->addDay()->format('Y-m-d') }}'" class="p-2 rounded-full hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" x-data="{ appointments: [] }" x-init="
                        fetch(`/api/medecin/appointments?date=${date}`)
                            .then(response => response.json())
                            .then(data => { appointments = data })
                    " x-effect="
                        fetch(`/api/medecin/appointments?date=${date}`)
                            .then(response => response.json())
                            .then(data => { appointments = data })
                    ">
                        <template x-for="appointment in appointments" :key="appointment.id">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900" x-text="appointment.appointment_time"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900" x-text="appointment.patient.name"></div>
                                    <div class="text-sm text-gray-500" x-text="appointment.patient.email"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800': appointment.status === 'completed',
                                            'bg-yellow-100 text-yellow-800': appointment.status === 'scheduled',
                                            'bg-red-100 text-red-800': appointment.status === 'cancelled'
                                        }"
                                        x-text="appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1)">
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button @click="$dispatch('open-modal', {content: `<div class='p-6'><h3 class='text-lg font-medium text-gray-900 mb-4'>Update Appointment Status</h3><form action='/appointments/${appointment.id}/update-status' method='POST'><input type='hidden' name='_token' value='{{ csrf_token() }}'><div class='mb-4'><label class='block text-sm font-medium text-gray-700 mb-2'>Status</label><select name='status' class='mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md'><option value='scheduled'>Scheduled</option><option value='completed'>Completed</option><option value='cancelled'>Cancelled</option></select></div><div class='mb-4'><label class='block text-sm font-medium text-gray-700 mb-2'>Notes</label><textarea name='notes' rows='3' class='shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md'>${appointment.notes || ''}</textarea></div><div class='flex justify-end'><button type='button' @click=\"$dispatch('close-modal')\" class='bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3'>Cancel</button><button type='submit' class='inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500'>Update</button></div></form></div>`})" class="text-teal-600 hover:text-teal-900 mr-3">Update</button>
                                    <a :href="`/appointments/${appointment.id}`" class="text-blue-600 hover:text-blue-900">View</a>
                                </td>
                            </tr>
                        </template>
                        <template x-if="appointments.length === 0">
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No appointments scheduled for this day.
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

