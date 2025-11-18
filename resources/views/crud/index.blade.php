@extends('layouts.main')

@section('title', 'Ételek CRUD')

@section('content')

{{-- CRUD nézet frissítve: kép hozzáadva --}}

<div style="
    background-image: url('{{ asset('editorial/images/crud.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 70px 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    color: white;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.85);
">
    <h1 style="font-size: 2.3rem; font-weight:bold;">Ételek kezelése (CRUD)</h1>
    <p style="max-width: 700px; font-size: 1.1rem;">
        Itt tudod az adatbázisban lévő ételeket hozzáadni, szerkeszteni vagy törölni.
    </p>
</div>

<h1> Ételek kezelése</h1>

<a href="{{ route('crud.create') }}" class="btn btn-primary mb-3">Új étel hozzáadása</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Kategória</th>
            <th>Leírás</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etelek as $etel)
        <tr>
            <td>{{ $etel->id }}</td>
            <td>{{ $etel->nev }}</td>
            <td>{{ $etel->kategoria->nev ?? '-' }}</td>
            <td>{{ $etel->leiras }}</td>
            <td>
                <a href="{{ route('crud.edit', $etel->id) }}"> Szerkesztés</a>

                <form action="{{ route('crud.destroy', $etel->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Biztos törlöd?')" style="color:red;"> Törlés</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
