<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="p-6">
                <h3 class="text-2xl font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-300">Admin Panel</a>
                </h3>
            </div>
            

            <!-- Sidebar Links -->
            <nav class="mt-6">
                <a href="{{ route('admin.users.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-users mr-2"></i> Users
                </a>
                <a href="{{ route('admin.products.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-box-open mr-2"></i> Products
                </a>
                <a href="{{ route('admin.cms.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-file-alt mr-2"></i> CMS Pages
                </a>
                <a href="{{ route('admin.roles.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-user-shield mr-2"></i> Assign Role
                </a>
            </nav>
        </div>

        <div class="container mx-auto">
            <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-md">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                </div>
                <div class="mb-4">
                    <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select id="roles" name="roles" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('roles') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">Create User</button>
            </form>
        </div>
    </div>

    <!-- Include Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 for Roles dropdown
            $('#roles').select2({
                placeholder: 'Select roles',  // Placeholder text
                allowClear: true,             // Allow clearing the selection
            });
        });
    </script>
</x-app-layout>
