<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Specialties Management') }}
            </h2>
            <button @click="$dispatch('open-modal', {content: document.getElementById('create-specialite-form').innerHTML})" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Specialty
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <div class="relative">
                            <form action="{{ route('admin.specialites.index') }}" method="GET" class="flex items-center">
                                <input type="text" name="search" placeholder="Search specialties..." value="{{ request('search') }}" class="border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm pr-10">
                                <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctors Count</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($specialites as $specialite)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $specialite->name }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">{{ $specialite->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">{{ $specialite->medecins_count }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button @click="$dispatch('open-modal', {content: document.getElementById('edit-specialite-{{ $specialite->id }}').innerHTML})" class="text-teal-600 hover:text-teal-900 mr-3">Edit</button>
                                            <button @click="$dispatch('open-modal', {content: document.getElementById('delete-specialite-{{ $specialite->id }}').innerHTML})" class="text-red-600 hover:text-red-900">Delete</button>
                                            
                                            <!-- Hidden edit form -->
                                            <div id="edit-specialite-{{ $specialite->id }}" class="hidden">
                                                <div class="p-6">
                                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Specialty</h3>
                                                    <form action="{{ route('admin.specialites.update', $specialite) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid grid-cols-1 gap-4 mb-4">
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                                <input type="text" name="name" value="{{ $specialite->name }}" required class="mt-1 block w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
                                                            </div>
                                                            
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                                                <textarea name="description" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $specialite->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex justify-end">
                                                            <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                                                Update Specialty
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            <!-- Hidden delete confirmation -->
                                            <div id="delete-specialite-{{ $specialite->id }}" class="hidden">
                                                <div class="p-6">
                                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Delete Specialty</h3>
                                                    <p class="mb-4 text-sm text-gray-600">Are you sure you want to delete this specialty? This action cannot be undone.</p>
                                                    <form action="{{ route('admin.specialites.destroy', $specialite) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="flex justify-end">
                                                            <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                Delete Specialty
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $specialites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hidden create form -->
    <div id="create-specialite-form" class="hidden">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Specialty</h3>
            <form action="{{ route('admin.specialites.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <button type="button" @click="$dispatch('close-modal')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Create Specialty
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

