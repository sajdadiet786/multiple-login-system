@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CMS Pages</h1>
    <a href="{{ route('admin.cms.create') }}" class="btn btn-primary">Add CMS Page</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cmsPages as $cmsPage)
                <tr>
                    <td>{{ $cmsPage->title }}</td>
                    <td>{{ $cmsPage->slug }}</td>
                    <td>{{ $cmsPage->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.cms.edit', $cmsPage) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.cms.destroy', $cmsPage) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cmsPages->links() }} <!-- For pagination -->
</div>
@endsection
