@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus animais</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if (count($animals) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td scope="rol">{{ $loop -> index + 1}}</td>
                    <td>
                        <a href="{{route('knowMore', $animal -> id )}}">{{$animal -> name}}</a>
                    </td>
                    <td>
                        {{ date('d/m/Y', strtotime($animal -> birth_day))}}
                    </td>
                    <td>
                        <a href="{{route('animals.edit', ['id' => $animal -> id])}}" class="btn btn-info edit-btn"><ion-icon name="pencil-outline"></ion-icon>Editar</a>

                        <form action="{{route('animals.delete', ['id' => $animal -> id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">
                                <ion-icon name="pencil-outline">
                                </ion-icon>
                                Deletar
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
        </table>
            <p>Você não tem nenhum animal para doação. Quer adicionar? <a href="{{route('animals.create')}}">Adicionar</a></p>

            {{ $animals->links() }}
        @endif
    </div>
@endsection
