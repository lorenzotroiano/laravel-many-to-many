@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Create new Project</h1>

        <form method="POST" action="{{ route('project.store') }}">

            @csrf
            @method('POST')

            <label for="title">title</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <label for="publish_date">publish_date</label>
            <br>
            <input type="date" name="publish_date" id="publish_date">
            <br>
            <label for="description">description</label>
            <br>
            <input type="text" name="description" id="description">
            <br>
            <label for="accessibility">accessibility</label>
            <br>
            <input type="text" name="accessibility" id="accessibility">
            <br>

            <!-- Dropdown per selezionare il tipo del progetto -->
            <select name="type_id" id="type_id">
                <!-- Itera attraverso tutti i tipi disponibili -->
                @foreach ($types as $type)
                    <!-- Ogni opzione ha un valore corrispondente all'ID del tipo -->
                    <option value="{{ $type->id }}">
                        <!-- Il testo all'interno dell'opzione è il nome del tipo -->
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            <br>
            <!-- Checkbox per selezionare le tecnologie del progetto -->
            @foreach ($technologies as $technology)
                <!-- Ogni checkbox ha un nome (tecnologies[]) che indica un array delle tecnologie selezionate -->
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                <!-- Il testo accanto alla checkbox è il nome della tecnologia -->
                {{ $technology->name }}

                </input>
            @endforeach
            <!-- Bottone di submit per inviare il form -->
            <input class="my-3" type="submit" value="CREATE">

        </form>
    </div>
@endsection
