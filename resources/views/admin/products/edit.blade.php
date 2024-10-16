<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="p-6">
                <h3 class="text-2xl font-semibold">Admin Panel</h3>
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
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-md">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                    @error('name')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price Input -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                    @error('price')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Input -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image (Leave empty to keep the current image)</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    @error('image')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                    <!-- Display Current Image -->
                    @if($product->image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-md">
                        </div>
                    @endif
                </div>

                <!-- Select Users for Product with Select2 -->
                <div class="mb-4">
                    <label for="users" class="block text-sm font-medium text-gray-700">Assign Users to Product</label>
                    <select name="users[]" id="users" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $product->users->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('users')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    Update Product
                </button>
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
        // Initialize Select2 on the users dropdown
        $('#users').select2({
            placeholder: 'Select users', // Placeholder text
            allowClear: true,            // Enable clearing the selection
            width: '100%'                // Make sure the dropdown uses the full width
        });
    });
</script>
