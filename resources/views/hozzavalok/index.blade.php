{{-- Hozzávalók nézet – készítette: Mészáros Eszter --}}


@extends('layouts.main')

@section('content')
    <h1>🥕 Hozzávalók listája</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Mértékegység</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hozzavalok as $hozzavalo)
                <tr>
                    <td>{{ $hozzavalo->id }}</td>
                    <td>{{ $hozzavalo->nev }}</td>
                    <td>{{ $hozzavalo->mertekegyseg ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
