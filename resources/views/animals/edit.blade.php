@extends('layouts.main')

@section('title', 'Editar ' . $animal -> name)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1 class="mb-4 text-center">
                            <ion-icon name="pencil-outline"></ion-icon>
                            Editando
                        </h1>

                        <form action="{{route('animals.update', ['id' => $animal -> id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="image">

                                <label for="image">Imagem:</label>

                                <input type="file" id="image" name="image" class="form-control-file">

                            </div>

                            <div class="form-group">

                                <label for="title">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{ $animal -> name }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Data de nascimento: </label>

                                <input type="date" class="form-control" name="birth_day" value="{{$animal -> birth_day -> format('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" cols="18" rows="6">{{ $animal -> description}}</textarea>
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


                            <input type="submit" class="btn btn-primary" value="Editar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
