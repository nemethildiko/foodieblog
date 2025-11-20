{{-- Használt alapanyagok nézet – készítette: Mészáros Eszter --}}

@extends('layouts.main')

@section('content')
    <h1>⚙️ Használt hozzávalók</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Étel</th>
                <th>Hozzávaló</th>
                <th>Mennyiség</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasznalt as $item)
                <tr>
                    <td>{{ $item->etel->nev ?? '-' }}</td>
                    <td>{{ $item->hozzavalo->nev ?? '-' }}</td>
                    <td>{{ $item->mennyiseg }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
