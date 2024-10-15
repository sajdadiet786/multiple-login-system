<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Super Admin Dashboard
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
                <a href="{{ route('admin.cms.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-file-alt mr-2"></i> Assign Role
                </a>
            </nav>
        </div>

        <!-- Main Dashboard Content -->
        <div class="flex-1 p-6 bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Users Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500 text-white">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                                <p class="text-3xl font-bold text-gray-900">{{ $userCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Products Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500 text-white">
                                <i class="fas fa-box-open fa-2x"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
                                <p class="text-3xl font-bold text-gray-900">{{ $productCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total CMS Pages Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-500 text-white">
                                <i class="fas fa-file-alt fa-2x"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">Total CMS Pages</h3>
                                <p class="text-3xl font-bold text-gray-900">{{ $cmsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Widgets or Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Activity</h3>
                        <!-- Add recent activity details or table here -->
                    </div>

                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">System Health</h3>
                        <!-- Add system health status or progress bars here -->
                    </div>

                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">New Users</h3>
                        <!-- Add list of new users or stats -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
