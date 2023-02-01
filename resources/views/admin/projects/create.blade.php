@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h1>Crea Nuovo Progetto</h1>
      @include('partials.errors')
      <div class="mt-4">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo"
              value="{{ old('title') }}">
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Inserisci il cliente"
              value="{{ old('company') }}">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="10"
              placeholder="Inserisci la descrizione">{{ old('description') }}</textarea>
          </div>
          <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image"
              value="{{ old('cover_image') }}">
          </div>
          <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-select" name="type_id" id="type_id">
              <option value="">Senza Tipologia</option>
              @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                  {{ $type->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <div class="mb-3">Tecnologie</div>
            @foreach ($technologies as $technology)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{ $technology->slug }}" name="technologies[]"
                  value="{{ $technology->id }}"
                  {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $technology->slug }}">{{ $technology->name }}</label>
              </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-primary">Crea</button>
        </form>
      </div>
    </div>
  </div>
@endsection
