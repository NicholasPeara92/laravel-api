@extends('layouts.admin')

@section('content')
  <h1>Lista Progetti</h1>
  @include('partials.message')
  <div class="my-4">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Nuovo Progetto</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Cliente</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <td>{{ $project->id }}</td>
          <td>{{ $project->title }}</td>
          <td>{{ $project->slug }}</td>
          <td>{{ $project->company }}</td>
          <td>
            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"><i
                class="fa-solid fa-eye"></i></a>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                class="fa-solid fa-pen"></i></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
              data-bs-target="#modal-{{ $project->id }}">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
        <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Sei sicuro di eliminare il progetto "{{ $project->title }}"?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Si</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </tbody>
  </table>
@endsection
