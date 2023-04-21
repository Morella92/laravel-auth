@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center">
            <h1 class="me-auto">Tutti i progetti</h1>

            <div>
                <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">Nuovo progetto</a>
            </div>
        </div>
    </div>

    <div class="container">
      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Data creazione</th>
            <th>Data modifica</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>
                  <a href="{{ route('projects.show',$project) }}">{{ $project->title }}</a>
                </td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td>
                  {{ $project->trashed() ? $project->deleted_at : '' }}
                </td>
                <td>
                  <div class="d-flex ">
                    <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit',$project) }}">Edit</a>
                    <form action="{{ route('projects.destroy',$project) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                    </form>
                    @if($project->trashed())
                      <form action="{{ route('projects.restore',$project) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                      </form>
                    @endif
                  </div>
                </td>
            </tr>
          @empty
            <tr>
              <th colspan="6">Nessun progetto trovato</th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
@endsection