@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>{{ $project->title }}</h1>
                <p>/{{ $project->slug }}</p>
            </div>

            <div>
                <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit',$project) }}">Modifica</a>
                @if($project->trashed())
                    <form action="{{ route('projects.restore',$project) }}" method="POST">
                      @csrf
                      <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <p>
            {{ $project->content }}
        </p>
    </div>
@endsection