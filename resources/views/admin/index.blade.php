@extends('layouts.main')

@section('content')
  <h2>Admin felület</h2>
  <p>Csak adminoknak érhető el.</p>

  <section class="mb-3">
    <h3>Statisztikák</h3>
    <ul>
      <li><strong>Felhasználók összesen:</strong> {{ $stats['users'] }}</li>
      <li><strong>Adminok száma:</strong> {{ $stats['admins'] }}</li>
      <li><strong>Üzenetek összesen:</strong> {{ $stats['messages'] }}</li>
    </ul>
  </section>

  <section>
    <h3>Legutóbbi üzenetek</h3>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Küldő neve</th>
          <th>Email</th>
          <th>Üzenet</th>
          <th>Küldés ideje</th>
        </tr>
      </thead>
      <tbody>
        @forelse($latestMessages as $message)
          <tr>
            <td>{{ $message->nev }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->uzenet }}</td>
            <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
          </tr>
        @empty
          <tr><td colspan="4">Nincsenek üzenetek.</td></tr>
        @endforelse
      </tbody>
    </table>
  </section>
@endsection
