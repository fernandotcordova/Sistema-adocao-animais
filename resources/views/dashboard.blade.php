@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus animais</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if (count($animals) > 0)
            <p>Você não tem nenhum animal para doação. Quer adicionar? <a href="animal/create">Adicionar</a></p>
        @endif
    </div>
@endsection

