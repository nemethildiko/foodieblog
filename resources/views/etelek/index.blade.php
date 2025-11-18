@extends('layouts.main') {{-- ez a te sablonod neve --}}

@section('content')


@section('content')

<!-- HERO SZEKCIÓ HÁTTÉRKÉPPEL -->
<div style="
    background-image: url('{{ asset('editorial/images/paprika.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 90px 30px;
    border-radius: 12px;
    margin-bottom: 40px;
    color: white;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
">
    <h1 style="font-size: 2.5rem;"> Ételek és hozzávalók</h1>
    <p style="max-width: 700px; font-size: 1.1rem;">
        Böngészd adatbázisunk legfinomabb receptjeit!
        Itt megtalálod minden étel hozzávalóit, kategóriáját és leírását.
    </p>
</div>

<div class="container">
    <h1 class="mb-4"> Ételek listája</h1>

    @foreach($etelek as $etel)
        <div class="card mb-4">
            <div class="card-body">
                <h3>{{ $etel->nev }}</h3>
                <p><strong>Kategória:</strong> {{ $etel->kategoria->nev ?? 'Ismeretlen' }}</p>
                <p><strong>Felírás dátuma:</strong> {{ $etel->felirdatum ?? '-' }}</p>
                <p><strong>Első dátum:</strong> {{ $etel->elsodatum ?? '-' }}</p>

                <h5>Hozzávalók:</h5>
                @if($etel->hozzavalok->isEmpty())
                    <p><em>Nincsenek hozzávalók.</em></p>
                @else
                    <ul>
                        @foreach($etel->hozzavalok as $hozzavalo)
                            <li>
                                {{ $hozzavalo->nev }}
                                @if($hozzavalo->pivot->mennyiseg)
                                    – {{ $hozzavalo->pivot->mennyiseg }} {{ $hozzavalo->pivot->egyseg }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
