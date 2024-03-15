@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-12 d-flex justify-content-between align-items-center my-3">
            <div class="index-title">
                My projects
            </div>
            <div>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-sm new-button">New Project</a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead class="my-thead">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Authors</th>
                        <th>Completed</th>
                        <th>Type</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 30, '...') }}</td>
                        <td>{{ $project->authors }}</td>
                        <td>{{ $project->completed ? 'Yes' : 'No' }}</td>
                        <td>{{ $project->type_id != null ? $project->type->name : 'No type' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="btn btn-sm btn-square tools-button">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-sm btn-square tools-button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-square tools-button">
                                <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection