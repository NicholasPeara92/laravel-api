@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h1>{{ $project->title }}</h1>
      <h3>
        @if ($project->type)
          Categoria: <a href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a>
        @else
          Nessuna Categoria
        @endif
      </h3>
      @if ($project->technologies)
        @foreach ($project->technologies as $technology)
          <span class="badge rounded-pill text-bg-dark"><a href="#"
              class="text-white text-decoration-none">{{ $technology->name }}</a></span>
        @endforeach
      @else
        Nessun Categoria
      @endif
      <div class="mt-4">
        <div class="text-center">
          @if ($project->cover_image)
            <img class="w-25" src="{{ asset("storage/$project->cover_image") }}" alt="{{ $project->title }}">
          @endif
        </div>
        {{ $project->description }}
      </div>
    </div>
  </div>
@endsection
