<!-- resources/views/admin/users/edit.blade.php -->
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit User') }}
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
      <form action="{{ route('admin.users.update', $user) }}" method="POST" class="bg-white p-6 shadow-md rounded-md">
          @csrf
          @method('PUT')
          <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
          </div>
          <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
          </div>
          <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password (Leave empty to keep current)</label>
              <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
          </div>
          <div class="mb-4">
              <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
              <select id="roles" name="roles[]" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" multiple>
                  @foreach($roles as $role)
                      <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn bg-yellow-600 text-white hover:bg-yellow-700 px-4 py-2 rounded-md">Update User</button>
      </form>
  </div>
  </div>
</x-app-layout>
