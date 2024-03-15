@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-12 d-flex justify-content-between align-items-center my-3">
            <div class="index-title">
                All Technologies
            </div>
            <div>
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-sm new-button">New Technology</a>
            </div>
        </div>
        <div class="col-6">
            <table class="table table-striped">
                <thead class="my-thead">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->name }}</td>
                        <td>
                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-sm btn-square tools-button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare?')" class="d-inline-block">
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