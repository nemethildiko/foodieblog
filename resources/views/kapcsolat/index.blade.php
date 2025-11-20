
{{-- Kapcsolat oldal nézet - a felület kialakítása: Németh Ildikó --}}

@extends('layouts.main')

@section('title', 'Kapcsolat')

@section('content')

<img src="/editorial/images/kapcsolat.jpg"
     alt="Kapcsolat kép"
     class="img-fluid rounded mb-4">

    <h1 class="mb-4">📩 Kapcsolat</h1>

    <form method="POST" action="{{ route('kapcsolat.store') }}" class="col-md-6">
        @csrf
        <div class="mb-3">
            <label for="nev" class="form-label">Név</label>
            <input type="text" id="nev" name="nev" class="form-control" value="{{ old('nev') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="uzenet" class="form-label">Üzenet</label>
            <textarea id="uzenet" name="uzenet" rows="4" class="form-control" required>{{ old('uzenet') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Küldés</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection
