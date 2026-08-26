@extends('layouts.main')

@section('title', 'Welcome Blade')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um animalzinho</h1>

    <form action="{{route('index')}}" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Busque pela raça">

        <button type="submit" class="search-btn">
            <ion-icon name="play-skip-forward-outline"></ion-icon>
        </button>
    </form>
</div>
<div id="animals-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Animais disponíveis para adoção</h2>
    @endif

    <p>Veja os animais que estão disponíveis para adoção</p>
    <div id="cards-container" class="row">
        @foreach ($animals as $animal)
            <div class="card col-md-3">
                <img src="img/animals/{{ $animal -> image}}" alt="{{ $animal -> name}}" class="card-img-top">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($animal -> birth_day))}}</p>

                    <h5 class="card-title">{{$animal -> name}}</h5>

                    <p class="card-participants">{{ $animal -> breed }} </p>
                    <a href="{{route('knowMore', $animal -> id)}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>


        @endforeach

        @if(count($animals) == 0 && $search)
            <p>
                <ion-icon name="close-outline"></ion-icon>
                Não foi possível encontrar nenhum animal com a seguinte raça {{$search}}
                <a href="/">Ver todos os animais</a>
            </p>
        @elseif(count($animals) == 0)
        @endif

    </div>
    </div>


</div>
    {{ $animals->appends(['search' => $search]) -> links()}}
@endsection
