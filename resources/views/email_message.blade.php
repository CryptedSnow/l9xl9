@extends('templates.template_hunter')
@section('title', "E-mail para $nome_hunter")
@section('content')

<table style="border-collapse: collapse; width: 100%; max-width: 600px; margin: 0 auto;">
    <tr>
        <td style="background-color: #f8f8f8; padding: 20px; text-align: center;">
            <h1>Detalhes do Hunter</h1>
        </td>
    </tr>
    <tr>
        <td style="padding: 20px;">
            <p><strong>ID:</strong>Nº {{ $id }}</p>
            <p><strong>Nome:</strong> {{ $nome_hunter }}</p>
            <p><strong>Email:</strong> {{ $email_hunter }}</p>
            <p><strong>Idade:</strong> {{ $idade_hunter }} anos</p>
            <p><strong>Altura:</strong> {{ $altura_hunter }} m</p>
            <p><strong>Peso:</strong> {{ $peso_hunter }} kg</p>
            <p><strong>Tipo:</strong> {{ $tipo_hunter }}</p>
            <p><strong>Nen:</strong> {{ $tipo_nen }}</p>
            <p><strong>Tipo sanguíneo:</strong> {{ $tipo_sangue }}</p>
            @php
                $imagens = explode(',', $imagem_hunter);
                $num_imagens = count($imagens);
            @endphp
            @if ($num_imagens == 1)
                <p><strong>Imagem:</strong> {{ $num_imagens }} imagem</p>
            @else
                <p><strong>Imagens:</strong> {{ $num_imagens }} imagens</p>
            @endif
            <p><strong>Serial:</strong> {{ $serial }}</p>
        </td>
    </tr>
</table>

@endsection
