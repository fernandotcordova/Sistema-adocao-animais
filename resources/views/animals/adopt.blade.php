@extends('layouts.main')

@section('title', 'Adoto')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h1 class="mb-4 text-center">
                            <ion-icon name="heart-circle-outline"></ion-icon>
                            Adote um animal
                        </h1>


                        <form action="{{ route('animals.adopt.submit')}}" method="post">
                            @csrf
                            <input type="hidden" name="animal_id" value="{{$id}}">

                            <div class="form-group">

                                <label for="title">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{auth() -> user() -> name}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Digite seu e-mail: </label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descreva por quê você poderia adotar esse animal:</label>
                                <textarea name="description" id="description" cols="18" rows="6" required></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Adotar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
