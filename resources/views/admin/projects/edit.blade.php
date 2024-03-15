@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row my-4">

        {{-- TITOLO SEZIONE --}}
        <div class="col-12 index-title my-3">
            Edit project
        </div>

        {{-- SEZIONE RECAP ERRORI --}}
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- INIZIO FORM  --}}
        <div class="col-12">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- FORM - COLONNA UNO --}}
                    <div class="col-6">
                        <div class="form-group my-3">
                            <label for="title">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') ?? $project->title }}">
                            @error('title')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description')  ?? $project->description }}</textarea>
                            @error('description')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- FORM - COLONNA DUE --}}
                    <div class="col-6">
                        <div class="form-group my-3">
                            <label for="type_id">Type of project</label>
                            <select class="form-select" name="type_id" id="type_id">
                                <option value="">Select an option</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="technology_id">Technologies</label><br>
                            @foreach ($technologies as $technology)
                                <div class="form-check-inline">
                                <input type="checkbox" name="technologies[]" id="technology-{{$technology->id}}" class="form-check-input" value="{{ $technology->id }}" @checked(is_array(old('technologies')) && in_array(old('technologies')))>
                                <laberl for="" class="form-check-label">{{ $technology->name }}</label>
                                </div>
                            @endforeach
        
                        </div>
                        <div class="form-group my-3">
                            <label for="preview_image">Preview image</label>
                            <input class="form-control @error('preview_image') is-invalid @enderror" type="file" name="preview_image" id="preview_image" value="{{ old('preview_image') ?? $project->preview_image }}">
                            @error('preview_image')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="authors">Authors</label>
                            <input class="form-control @error('authors') is-invalid @enderror" type="text" name="authors" id="authors" value="{{ old('authors') ?? $project->authors }}"required>
                            @error('authors')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="completed">Completed</label>
                            <select class="form-sselect @error('completed') is-invalid @enderror" name="completed" id="completed">
                                <option value="">Select an option</option>
                                <option value="1" @selected(old('completed', $project->completed) == 1)>Yes</option>
                                <option value="0" @selected(old('completed', $project->completed) == 0)>No</option>
                            </select>
                            @error('completed')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                {{-- BOTTONE --}}
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-sm new-button">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection