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
  
      <div class="container mx-auto">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-md">
          @csrf
          <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
              @error('name')
              <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
          </div>
  
          <div class="mb-4">
              <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
              <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
              @error('price')
              <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
          </div>
  
          <div class="mb-4">
              <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
              <input type="file" id="image" name="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" >
              @error('image')
              <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
          @enderror
          </div>
  
          <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">Create Product</button>
        </form>
      </div>
    </div>
  </x-app-layout>
  