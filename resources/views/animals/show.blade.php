@extends('layouts.main')

@section('title', $animal -> name)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="{{asset('img/animals/' . $animal -> image)}}" class="img-fluid" alt="{{$animal -> name}}">
            </div>

            <div id="info-container" class="col-md-6">
                <h1>
                    <ion-icon name="finger-print-outline"></ion-icon>
                    {{$animal -> name }}
                </h1>
                <hr class="line">

                <p class="birth-day">
                    <ion-icon name="calendar-outline"></ion-icon>
                    {{ date('d/m/Y', strtotime($animal -> birth_day))}}
                </p>

                <p class="breed">
                    <ion-icon name="paw-outline"></ion-icon>
                    {{$animal -> breed}}
                </p>

                <p class="owner">
                    <ion-icon name="person-outline"></ion-icon>
                    {{ $animalOwner['name'] }}
                </p>



                <span class="col-md-12" id="description-container">
                    <div class="about-animal">
                        <h3>Sobre o animal</h3>
                        <p class="animal-description">{{$animal -> description}}</p>
                    </div>
            </span>

                <a href="adopt/{{$animal -> id}}" class="btn btn-primary" id="animal-submit">Adotar</a>
            </div>




        </div>
    </div>

@endsection
