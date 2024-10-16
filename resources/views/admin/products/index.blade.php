<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Management') }}
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
        <div class="flex-1 p-6 bg-gray-100">
            <div class="container mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Products</h1>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md">Add Product</a>
        
                <table class="table mt-6 w-full table-auto bg-white shadow-md rounded-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Image</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->price }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded-md">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
