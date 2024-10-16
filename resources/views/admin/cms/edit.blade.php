<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit CMS Page') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('admin.cms.update', $cmsPage->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-md">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $cmsPage->title) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $cmsPage->slug) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="content" name="content" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">{{ old('content', $cmsPage->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
                    <option value="1" {{ $cmsPage->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$cmsPage->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                Update Page
            </button>
        </form>
    </div>
</x-app-layout>
