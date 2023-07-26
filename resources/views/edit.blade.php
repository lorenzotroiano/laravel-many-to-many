@extends('layouts.app')

@section('content')
    <div class="container text-center p-4">
        <form method="POST" action="{{ route('project.update', $project->id) }}">
            @csrf
            @method('PUT')
            <!-- Campi di input per modificare i dettagli del progetto -->
            <!-- ad esempio: -->
            <label for="title">title:</label>
            <input type="text" name="title" value="{{ $project->title }}" required>

            <label for="publish_date">publish_date:</label>
            <input type="date" name="publish_date" value="{{ $project->publish_date }}" required>

            <label for="description">description:</label>
            <input type="text" name="description" value="{{ $project->description }}" required>

            <!-- Dropdown per i tipi -->
            <label for="type_id">Tipo:</label>
            <select name="type_id" required>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
                        {{ $type->type_name }}</option>
                @endforeach
            </select>

            <!-- Checkboxes per le tecnologie -->
            <label>Tecnologie:</label><br>
            @foreach ($technologies as $technology)
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                    {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'checked' : '' }}>
                {{ $technology->name }}<br>
            @endforeach

            <button type="submit">Salva modifiche</button>
        </form>
    </div>
@endsection
