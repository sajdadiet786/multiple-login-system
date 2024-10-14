@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add CMS Page</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Active</label>
            <input type="checkbox" id="is_active" name="is_active" checked>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
