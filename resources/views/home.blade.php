@extends('layouts.main')

@section('title', 'Főoldal')

@section('content')

<style>
    .hero {
        position: relative;
        background-image: url('/editorial/images/magyar-receptek.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 120px 40px;
        border-radius: 12px;
        color: white;
        text-shadow: 0 0 12px rgba(0, 0, 0, 0.8);
        overflow: hidden;
    }

    .hero::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.55);
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }
</style>

<section class="hero">
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Üdvözlünk a FoodieBlog világában!</h1>
        <p class="lead mt-3">
            Itt a hagyományos magyar ízek találkoznak a modern gasztronómiai élményekkel.
            Böngéssz receptjeink között, fedezd fel adatbázisunkat, küldj üzenetet, vagy nézd meg vizuális statisztikáinkat!
        </p>

        <a href="{{ route('etelek.index') }}" class="button primary mt-4">
            Fedezd fel az ételeket →
        </a>
    </div>
</section>

@endsection
