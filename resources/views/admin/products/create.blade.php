<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
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

        <!-- Main Content -->
        <div class="container mx-auto">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-md">
                @csrf

                <!-- Product Name Input -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                    @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Price Input -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                    @error('price')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Image Input -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
                    @error('image')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Assign Users Dropdown -->
                <div class="mb-4">
                    <label for="users" class="block text-sm font-medium text-gray-700">Assign Users</label>
                    <select name="users[]" id="users" multiple class="select2 form-control w-full mt-1 px-4 py-2 border border-gray-300 rounded-md">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('users')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                

                <!-- Submit Button -->
                <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">Create Product</button>
            </form>
        </div>
    </div>
</x-app-layout>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery and Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users').select2({
            placeholder: 'Select users', // Placeholder text
            allowClear: true             // Enable clearing the selection
        });
    });
</script>


