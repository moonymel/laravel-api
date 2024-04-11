@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-6 d-flex justify-content-between my-3">
                <div class="index-title">
                    {{ $project->title }}
                </div>
                <div class="image-sec">
                    <img src="{{ asset('/storage/' . $project->preview_image) }}" alt="{{ $project->title }}">
                </div>
                <div class="infos">
                    <b>Description</b>: {{ $project->description }}<br>
                    <b>Authors</b>: {{ $project->authors }}<br>
                    <b>Completed</b>: {{ $project->description ? 'Yes' : 'No' }}<br>
                    <b>Technologies</b>: 
                    @forelse ($project->technologies as $technology) 
                        #{{ $technology->name }}
                    @empty 
                        No technologies selected
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>

@endsection