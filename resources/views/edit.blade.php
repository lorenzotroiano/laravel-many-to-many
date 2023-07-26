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

            <!-- Dropdown per selezionare il tipo del progetto -->
            <!-- Dropdown per selezionare il tipo del progetto -->
            <label for="type_id">Tipo:</label>
            <select name="type_id" required>
                <!-- Itera attraverso tutti i tipi disponibili -->
                @foreach ($types as $type)
                    <!-- Ogni opzione ha un valore corrispondente all'ID del tipo -->
                    <option value="{{ $type->id }}" @if ($type->id == $project->type_id) selected @endif>
                        <!-- Il testo all'interno dell'opzione è il nome del tipo -->
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>

            <!-- Checkboxes per selezionare le tecnologie del progetto -->
            <label>Tecnologie:</label><br>
            <!-- Itera attraverso tutte le tecnologie disponibili -->
            @foreach ($technologies as $technology)
                <!-- Ogni checkbox ha un nome (tecnologies[]) che indica un array delle tecnologie selezionate -->
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                    @if (in_array($technology->id, $project->technologies->pluck('id')->toArray())) checked @endif>
                <!-- Il testo accanto alla checkbox è il nome della tecnologia -->
                {{ $technology->name }}<br>
            @endforeach



            <button type="submit">Salva modifiche</button>
        </form>
    </div>
@endsection
