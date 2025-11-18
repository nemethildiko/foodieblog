@extends('layouts.main')

@section('content')
    <h1>📚 Kategóriák listája</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Név</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriak as $kategoria)
                <tr>
                    <td>{{ $kategoria->id }}</td>
                    <td>{{ $kategoria->nev }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
