@extends('layouts.main')

@section('title', 'Új étel')

@section('content')
<h1>Új étel hozzáadása</h1>

<form action="{{ route('crud.store') }}" method="POST">
    @csrf

    <label>Név:</label>
    <input type="text" name="nev" required><br><br>

    <label>Kategória:</label>
    <select name="kategoria_id" required>
        @foreach($kategoriak as $kategoria)
        <option value="{{ $kategoria->id }}">{{ $kategoria->nev }}</option>
        @endforeach
    </select><br><br>

    <label>Leírás:</label>
    <textarea name="leiras"></textarea><br><br>

    <label>Felírás dátuma:</label>
    <input type="date" name="felirdatum"><br><br>

    <label>Első dátum:</label>
    <input type="date" name="elsodatum"><br><br>

    <button type="submit" class="btn btn-success">Mentés</button>
</form>
@endsection
