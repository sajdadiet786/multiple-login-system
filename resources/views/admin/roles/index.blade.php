<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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
                    <i class="fas fa-user-shield mr-2"></i> Roles
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gray-100">
            <div class="container mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Roles</h1>
                <a href="{{ route('admin.roles.create') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4 inline-block">Create Role</a>
        
                <table class="w-full table-auto bg-white shadow-md rounded-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 text-left">Role Name</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $role->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="bg-yellow-500 text-white hover:bg-yellow-600 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">Edit</a>
                                    
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $roles->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
