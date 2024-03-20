@extends('templates.template_hunter')
@section('title', 'Listar Hunters')
@section('content')
    <!-- Alert status -->
    @include('components.alert-component')
    <!-- Form -->
    <div class="contained">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Listar Hunters
                            <a href="{{ url("create") }}" class="btn btn-success float-end" title="Cadastrar"><i class="fa fa-plus"></i>&nbsp;Cadastrar</a>
                            <a href="{{ url("export-pdf") }}" class="btn btn-dark float-center" title="PDF"><i class="fa fa-file-pdf"></i>&nbsp;PDF</a>
                            <a href="{{ url("log-viewer") }}" class="btn btn-warning float-center" target="_blank" title="LogViewer"><i class="fa fa-circle-info"></i>&nbsp;Logs</a>
                            <a href="{{ url("trash") }}" class="btn btn-danger float-center" title="Ver lixeira"><i class="fa fa-dumpster"></i>&nbsp;Ver lixeira</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="width:100%" id="search_hunter">
                        <thead>
                            <tr>
                                <th title="ID">ID</th>
                                <th title="Avatar">Avatar</th>
                                <th title="Nome">Nome</th>
                                <th title="Idade">Idade</th>
                                <th title="Altura">Altura</th>
                                <th title="Peso">Peso</th>
                                <th title="Tipo de hunter">Tipo de Hunter</th>
                                <th title="Tipo de nen">Tipo de Nen</th>
                                <th title="Tipo sanguíneo">Tipo sanguíneo</th>
                                <th title="Serial">Serial</th>
                                <th title="Data de cadastro">Data de cadastro</th>
                                <th title="Data de atualização">Data de atualização</th>
                                <th title="Ações">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hunter as $hxh)
                                <tr>
                                    <td title="{{ $hxh->id }}">{{ $hxh->id }}</td>
                                    <td>
                                        @foreach ($hxh->avatarHunter as $a)
                                            <img src="{{ asset($a->imagem) }}" height="100" width="100" style="margin: 5px">
                                        @endforeach
                                    </td>
                                    <td title="{{ $hxh->nome_hunter }}">{{ $hxh->nome_hunter }}</td>
                                    <td title="{{ $hxh->idade_hunter }}">{{ $hxh->idade_hunter }}</td>
                                    <td title="{{ $hxh->altura_hunter }} m">{{ $hxh->altura_hunter }} m</td>
                                    <td title="{{ $hxh->peso_hunter }} kg">{{ $hxh->peso_hunter }} kg</td>
                                    <td title="{{ $hxh->tipo_hunter }}">{{ $hxh->tipo_hunter }}</td>
                                    <td title="{{ $hxh->tipo_nen }}">{{ $hxh->tipo_nen }}</td>
                                    <td title="{{ $hxh->tipo_sangue }}">{{ $hxh->tipo_sangue }}</td>
                                    <td title="{{ $hxh->serial }}">{{ $hxh->serial }}</td>
                                    <td title="{{ \Carbon\Carbon::parse($hxh->created_at)->format('d/m/Y H:i:s')}}">{{ \Carbon\Carbon::parse($hxh->created_at)->format('d/m/Y H:i:s')}}</td>
                                    <td title="{{ $hxh->updated_at == $hxh->created_at ? 'Sem atualização' : \Carbon\Carbon::parse($hxh->updated_at)->format('d/m/Y H:i:s')}}">
                                    {{ $hxh->updated_at == $hxh->created_at ? 'Sem atualização' : \Carbon\Carbon::parse($hxh->updated_at)->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <form action="{{ url("delete/$hxh->id") }}" method="POST">
                                            <a href="{{ url("download-zip/$hxh->id") }}" class="btn btn-warning" title="Donwload imagem(ns) de {{ $hxh->nome_hunter }}"><i class="fa fa-file-zipper"></i>&nbsp;Download</a>
                                            <a href="{{ url("update/$hxh->id") }}" class="btn btn-primary" title="Atualizar {{ $hxh->nome_hunter }}"><i class="fa fa-arrows-rotate"></i>&nbsp;Atualizar</a>
                                            {{ ' ' }} {{ method_field('DELETE') }} {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" title="Deletar {{ $hxh->nome_hunter }}"><i class="fa fa-trash"></i>&nbsp;Lixeira</button>
                                        </form>
                                    </td>
                                </tr>
	                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
