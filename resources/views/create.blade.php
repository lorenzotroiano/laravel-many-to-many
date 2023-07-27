@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Create new Project</h1>

        <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <label for="main_picture">Main picture</label>
            <br>
            <input type="file" name="main_picture" id="main_picture">
            <br>


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

            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            <br>
            @foreach ($technologies as $technology)
                <div class="form-check mx-auto" style="max-width: 300px">
                    <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                        id="technology-{{ $technology->id }}">
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
            <!-- Bottone di submit per inviare il form -->
            <input class="my-3" type="submit" value="CREATE">

        </form>
    </div>
@endsection
