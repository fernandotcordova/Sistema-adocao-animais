@extends('layouts.main')

@section('title', 'Adicionar animal')

@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center">
                            <ion-icon name="paw-outline"></ion-icon>
                            Cadastre um novo animalzinho
                        </h2>

                        {{-- https://laravel.com/docs/10.x/validation --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('animals.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="image">

                                <input type="file" id="image" name="image" class="form-control-file">

                            </div>

                            <div class="form-group">

                                <label for="title">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name')}}">

                            </div>
                            <div class="form-group">
                                <label for="title">Data de nascimento: </label>
                                <input type="date" class="form-control" name="birth_day" value="{{ old('birth_day')}}">

                            </div>
                            <div class="form-group">
                                <label for="description"></label>
                                <textarea name="description" id="description" cols="18" rows="6">{{old('description')}}</textarea>

                            </div>
                            <div class="form-group">
                                <h3>Cachorros</h3>
                                <div class="form-group-dogs">

                                    <input type="radio" name="breed" id="breed" value="Cachorro Beagle">
                                    <label for="beagle">Beagle</label>

                                    <input type="radio" name="breed" id="breed" value="Cachorro Akita">
                                    <label for="akita">Akita Japonês</label>

                                    <input type="radio" name="breed" id="breed" value="Cachorro Basset">
                                    <label for="beagle">Basset Hound</label>
                                </div>
                                <hr>
                                <div class="form-groups-cats">
                                    <h3>Gatos</h3>
                                    <input type="radio" name="breed" id="breed" value="Gato Siâmes">
                                    <label for="siames">Siâmes</label>

                                    <input type="radio" name="breed" id="breed" value="Gato Persa">
                                    <label for="persa">Persa Japonês</label>

                                    <input type="radio" name="breed" id="breed" value="Gato exótico">
                                    <label for="beagle">Exótico</label>

                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Adicionar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
