<div class="card-body">
    <table class="table table-striped" style="width:100%" id="search_hunter">
        <thead>
            <tr>
                <th title="ID">ID</th>
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
            </tr>
        </thead>
        <tbody>
            @foreach($hunter as $hxh)
                <tr>
                    <td title="{{ $hxh->id }}">{{ $hxh->id }}</td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
