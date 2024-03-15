@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row my-4">

        {{-- TITOLO SEZIONE --}}
        <div class="col-12 index-title my-3">
            Edit technology
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
            <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- FORM - COLONNA UNO --}}
                    <div class="col-6">
                        <div class="form-group my-3">
                            <label for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ?? $technology->name }}">
                            @error('name')
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