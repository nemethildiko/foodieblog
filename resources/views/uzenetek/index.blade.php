@extends('layouts.main')

@section('title', 'Üzenetek')

@section('content')
    <h1 class="mb-4">📬 Beérkezett üzenetek</h1>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Email</th>
                <th>Üzenet</th>
                <th>Dátum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uzenetek as $uzenet)
                <tr>
                    <td>{{ $uzenet->id }}</td>
                    <td>{{ $uzenet->nev }}</td>
                    <td>{{ $uzenet->email }}</td>
                    <td>{{ $uzenet->uzenet }}</td>
                    <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
