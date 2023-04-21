@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Modifica: {{ $project->title }}</h1>
    </div>
    <div class="container">
        <form action="{{ route('projects.update',$project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$project->title) }}" id="title" aria-describedby="titleHelp">
              {{-- errore title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                 @enderror
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Contenuto</label>
              <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('content',$project->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection