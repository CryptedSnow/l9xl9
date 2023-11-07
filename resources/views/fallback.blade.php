@extends('templates.template_hunter')
@section('title', 'Fallback')
@section('content')

    <div class="alert alert-dark" role="alert">
        Página não existente. Por favor, clique <a href="{{ url("/") }}" class="alert-link">aqui</a> para retornar a página principal.
    </div>

@endsection
