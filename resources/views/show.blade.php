@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <h1>
            &#128193; {{ $project->title }}
        </h1>
        <h6> {{ $project->publish_date }}</h6>
        <p>
            {{ $project->description }}
        </p>



        <span class="bg-warning"> Type:
            {{ $project->type->type_name }}
        </span>


        <div class="bg-warning">Technologies:
            @foreach ($project->technologies as $technology)
                <span>{{ $technology->name }}</span>
            @endforeach
        </div>


        <a href="{{ route('project.edit', $project->id) }}">Modifica</a>

        <!-- Mostra i dettagli del progetto -->
        <!-- ... altre informazioni del progetto ... -->

        <!-- Form per confermare l'eliminazione -->
        <form method="POST" action="{{ route('project.destroy', $project->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Elimina</button>
        </form>



    </div>
@endsection
