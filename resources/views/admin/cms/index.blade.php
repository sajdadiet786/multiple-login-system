<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CMS Pages') }}
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
    <div class="container mx-auto mt-4">
        <a href="{{ route('admin.cms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Page</a>

        <table class="min-w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Slug</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td class="px-4 py-2 border">{{ $page->title }}</td>
                        <td class="px-4 py-2 border">{{ $page->slug }}</td>
                        <td class="px-4 py-2 border">{{ $page->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.cms.edit', $page) }}" class="text-yellow-600">Edit</a> |
                            <form action="{{ route('admin.cms.destroy', $page) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pages->links() }} <!-- Pagination -->
    </div>
</x-app-layout>
