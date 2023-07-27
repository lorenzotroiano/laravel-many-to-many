@extends('layouts.app')
@section('content')
    <div class="container p-5">

        <img src="
            {{ asset($project->main_picture ? 'storage/' . $project->main_picture : 'storage/images/project.jpg') }}"
            width="200px">

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

        @if ($project->main_picture)
            <form class="d-inline" method="POST" action="{{ route('project.picture.delete', $project->id) }}">
                @csrf
                @method('DELETE')
                <input class="btn btn-primary" type="submit" value="DELETE PICTURE">
            </form>
        @endif


        <!-- Form per confermare l'eliminazione -->
        <form method="POST" action="{{ route('project.destroy', $project->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Elimina</button>
        </form>



    </div>
@endsection
