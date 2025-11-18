@extends('layouts.main')

@section('title', 'Diagram')

@section('content')


<div style="
    background-image: url('{{ asset('editorial/images/Eszterhazy-Torta.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 80px 30px;
    border-radius: 12px;
    margin-bottom: 40px;
    color: white;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.85);
">
    <h1 style="font-size: 2.5rem; font-weight: bold;"> Ételstatisztikák</h1>
    <p style="font-size: 1.2rem; max-width: 750px;">
        Nézd meg vizuálisan, mely kategóriák a legnépszerűbbek, milyen összetevők fordulnak elő legtöbbször,
        és milyen eloszlásban szerepelnek adatbázisunkban!
    </p>
</div>
    <h1 class="mb-4"> Diagram</h1>
    <canvas id="etelChart" width="400" height="200"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('etelChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Levesek', 'Főételek', 'Desszertek', 'Tészták'],
                datasets: [{
                    label: 'Ételek száma',
                    data: [12, 19, 3, 5],
                }]
            }
        });
    </script>
@endsection
