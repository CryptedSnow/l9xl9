@extends('templates.template_update')
@section('title', "Atualizar $hunter->nome_hunter")
@section('content')
    <div class="contained">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Atualizar hunter
                            <a href=" {{ url("/") }} " class="btn btn-secondary float-end" title="Retornar listagem"><i class="fa fa-arrow-left"></i>&nbsp;Retornar listagem</a>
                        </h4>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <form action="{{ url("update/$hunter->id") }}" method="POST">
                        {{ method_field('PATCH') }} {{ csrf_field() }}
                        <div class="form_group">
                            <div class="form_group">
                                <div for="nome_hunter">
                                    <input type="number" class="form-control" name="id" value="{{ $hunter->id }}" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="nome_hunter">Nome:
                                    <input type="text" class="form-control" name="nome_hunter" placeholder="Digite o nome do Hunter" maxlength="50" value="{{ $hunter->nome_hunter }}">
                                    @error('nome_hunter')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="idade_hunter">Idade:
                                    <input type="text" class="form-control" name="idade_hunter" placeholder="Digite a idade do Hunter" onkeypress="$(this).mask('00', {reverse: true});" value="{{ $hunter->idade_hunter }}">
                                    @error('idade_hunter')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="altura_hunter">Altura:
                                    <input type="text" class="form-control" name="altura_hunter" placeholder="Digite a altura do Hunter" onkeypress="$(this).mask('0.00', {reverse: true});" value="{{ $hunter->altura_hunter }}">
                                    @error('altura_hunter')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="peso_hunter">Peso:
                                    <input type="text" class="form-control" name="peso_hunter" placeholder="Digite o peso do Hunter" onkeypress="$(this).mask('000.00', {reverse: true});" value="{{ $hunter->peso_hunter }}">
                                    @error('peso_hunter')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group"> 
                                <div for="tipo_hunter">Tipo de Hunter:
                                    <select class="form-control" name="tipo_hunter">
                                        <option value="" {{ $hunter->tipo_hunter == '' ? 'selected' : ''}}>Defina o tipo de Hunter</option>
                                        <option value="Hunter Gourmet" {{ $hunter->tipo_hunter == 'Hunter Gourmet' ? 'selected' : ''}}>Hunter Gourmet</option>
                                        <option value="Hunter Arqueólogo" {{ $hunter->tipo_hunter == 'Hunter Arqueólogo' ? 'selected' : ''}}>Hunter Arqueólogo</option>
                                        <option value="Hunter Cientista ou Hunter Técnico" {{ $hunter->tipo_hunter == 'Hunter Cientista ou Hunter Técnico' ? 'selected' : ''}}>Hunter Cientista ou Hunter Técnico</option>
                                        <option value="Hunter Selvagem ou Hunter Ambientalista" {{ $hunter->tipo_hunter == 'Hunter Selvagem ou Hunter Ambientalista' ? 'selected' : ''}}>Hunter Selvagem ou Hunter Ambientalista</option>
                                        <option value="Hunter Musical" {{ $hunter->tipo_hunter == 'Hunter Musical' ? 'selected' : ''}}>Hunter Musical</option>
                                        <option value="Hunter Treasure" {{ $hunter->tipo_hunter == 'Hunter Treasure' ? 'selected' : ''}}>Hunter Treasure</option>
                                        <option value="Hunter Lista Negra" {{ $hunter->tipo_hunter == 'Hunter Lista Negra' ? 'selected' : ''}}>Hunter Lista Negra</option>
                                        <option value="Hunter Mercenário" {{ $hunter->tipo_hunter == 'Hunter Mercenário' ? 'selected' : ''}}>Hunter Mercenário</option>
                                        <option value="Hunter Medicinal" {{ $hunter->tipo_hunter == 'Hunter Medicinal' ? 'selected' : ''}}>Hunter Medicinal</option>
                                        <option value="Hunter Hacker" {{ $hunter->tipo_hunter == 'Hunter Hacker' ? 'selected' : ''}}>Hunter Hacker</option>
                                        <option value="Hunter Cabeça" {{ $hunter->tipo_hunter == 'Hunter Cabeça' ? 'selected' : ''}}>Hunter Cabeça</option>
                                        <option value="Hunter de Informação" {{ $hunter->tipo_hunter == 'Hunter de Informação' ? 'selected' : ''}}>Hunter de Informação</option>
                                        <option value="Hunter Jackspot" {{ $hunter->tipo_hunter == 'Hunter Jackspot' ? 'selected' : ''}}>Hunter Jackspot</option>
                                        <option value="Hunter Vírus" {{ $hunter->tipo_hunter == 'Hunter Vírus' ? 'selected' : ''}}>Hunter Vírus</option>
                                        <option value="Hunter da Juventudade e Beleza" {{ $hunter->tipo_hunter == 'Hunter da Juventudade e Beleza' ? 'selected' : ''}}>Hunter da Juventudade e Beleza</option>
                                        <option value="Hunter Terrorista" {{ $hunter->tipo_hunter == 'Hunter Terrorista' ? 'selected' : ''}}>Hunter Terrorista</option>
                                        <option value="Hunter de Venenos" {{ $hunter->tipo_hunter == 'Hunter de Venenos' ? 'selected' : ''}}>Hunter de Venenos</option>
                                        <option value="Hunter Caçador" {{ $hunter->tipo_hunter == 'Hunter Caçador' ? 'selected' : ''}}>Hunter Caçador</option>
                                        <option value="Hunter Paleógrafo" {{ $hunter->tipo_hunter == 'Hunter Paleógrafo' ? 'selected' : ''}}>Hunter Paleógrafo</option>
                                        <option value="Hunter Perdido" {{ $hunter->tipo_hunter == 'Hunter Perdido' ? 'selected' : ''}}>Hunter Perdido</option>
                                        <option value="Hunter Provisório" {{ $hunter->tipo_hunter == 'Hunter Provisório' ? 'selected' : ''}}>Hunter Provisório</option>
                                        <option value="Hunter Temporário" {{ $hunter->tipo_hunter == 'Hunter Temporário' ? 'selected' : ''}}>Hunter Temporário</option>
                                    </select>
                                    @error('tipo_hunter')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div> 
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="tipo_nen">Tipo de Nen:
                                    <select class="form-control" name="tipo_nen">
                                        <option value="" {{ $hunter->tipo_nen == '' ? 'selected' : ''}}>Defina o tipo de Nen</option>
                                        <option value="Reforço" {{ $hunter->tipo_nen == 'Reforço' ? 'selected' : ''}}>Reforço</option>
                                        <option value="Emissão" {{ $hunter->tipo_nen == 'Emissão' ? 'selected' : ''}}>Emissão</option>
                                        <option value="Transformação" {{ $hunter->tipo_nen == 'Transformação' ? 'selected' : ''}}>Transformação</option>
                                        <option value="Manipulação" {{ $hunter->tipo_nen == 'Manipulação' ? 'selected' : ''}}>Manipulação</option>
                                        <option value="Materialização" {{ $hunter->tipo_nen == 'Materialização' ? 'selected' : ''}}>Materialização</option>
                                        <option value="Especialização" {{ $hunter->tipo_nen == 'Especialização' ? 'selected' : ''}}>Especialização</option>
                                    </select>
                                    @error('tipo_nen')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="tipo_sangue">Tipo sanguíneo:
                                    <select class="form-control" name="tipo_sangue">
                                        <option value="" {{ $hunter->tipo_sangue == '' ? 'selected' : ''}}>Defina o tipo sanguíneo</option>
                                        <option value="A+" {{ $hunter->tipo_sangue == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option value="A-" {{ $hunter->tipo_sangue == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option value="B+" {{ $hunter->tipo_sangue == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option value="B-" {{ $hunter->tipo_sangue == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option value="AB+" {{ $hunter->tipo_sangue == 'AB+' ? 'selected' : ''}}>AB+</option>
                                        <option value="AB-" {{ $hunter->tipo_sangue == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        <option value="O+" {{ $hunter->tipo_sangue == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option value="O-" {{ $hunter->tipo_sangue == 'O-' ? 'selected' : ''}}>O-</option>
                                    </select>
                                    @error('tipo_sangue')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" title="Atualizar"><i class="fa fa-edit"></i>&nbsp;Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <!-- Footer -->
    <footer class="container">
        <div class="row">
            <div class="col text-center">
                <em> Iury Fernandes, {{ date('Y') }}.</em>
            </div>
        </div>
    </footer>    
@endsection