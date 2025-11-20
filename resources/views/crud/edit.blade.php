
{{-- CRUD étel szerkesztése oldal - Németh Ildikó --}}

@extends('layouts.main')

@section('title', 'Étel szerkesztése')

@section('content')
<h1>Étel módosítása</h1>

<form action="{{ route('crud.update', $etel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Név:</label>
    <input type="text" name="nev" value="{{ $etel->nev }}" required><br><br>

    <label>Kategória:</label>
    <select name="kategoria_id" required>
        @foreach($kategoriak as $kategoria)
        <option value="{{ $kategoria->id }}"
            @if($etel->kategoria_id == $kategoria->id) selected @endif>
            {{ $kategoria->nev }}
        </option>
        @endforeach
    </select><br><br>

    <label>Leírás:</label>
    <textarea name="leiras">{{ $etel->leiras }}</textarea><br><br>

    <label>Felírás dátuma:</label>
    <input type="date" name="felirdatum" value="{{ $etel->felirdatum }}"><br><br>

    <label>Első dátum:</label>
    <input type="date" name="elsodatum" value="{{ $etel->elsodatum }}"><br><br>

    <button type="submit" class="btn btn-primary">Frissítés</button>
</form>
@endsection
