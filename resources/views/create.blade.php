@extends('templates.template_create')
@section('title', 'Cadastrar Hunter')
@section('content')
    <div class="contained">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Cadastrar Hunter
                            <a href="{{ url("/") }}" class="btn btn-secondary float-end" title="Retornar listagem"><i class="fa fa-arrow-left"></i>&nbsp;Retornar listagem</a>
                        </h4>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <form action="{{ url("create") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form_group">
                            <div class="form_group">
                                <div for="nome_hunter">Nome:
                                    <input type="text" class="form-control" name="nome_hunter" placeholder="Digite o nome do Hunter" maxlength="50">
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
                                    <input type="text" class="form-control" name="idade_hunter" placeholder="Digite a idade do Hunter" onkeypress="$(this).mask('00', {reverse: true});">
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
                                    <input type="text" class="form-control" name="altura_hunter" placeholder="Digite a altura do Hunter"onkeypress="$(this).mask('0.00', {reverse: true});">
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
                                    <input type="text" class="form-control" name="peso_hunter" placeholder="Digite o peso do Hunter" onkeypress="$(this).mask('000.00', {reverse: true});">
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
                                        <option value="">Defina o tipo de Hunter</option>
                                        <option value="Hunter Gourmet">Hunter Gourmet</option>
                                        <option value="Hunter Arqueólogo">Hunter Arqueólogo</option>
                                        <option value="Hunter Cientista ou Hunter Técnico">Hunter Cientista ou Hunter Técnico</option>
                                        <option value="Hunter Selvagem ou Hunter Ambientalista">Hunter Selvagem ou Hunter Ambientalista</option>
                                        <option value="Hunter Musical">Hunter Musical</option>
                                        <option value="Hunter Treasure">Hunter Treasure</option>
                                        <option value="Hunter Lista Negra">Hunter Lista Negra</option>
                                        <option value="Hunter Mercenário">Hunter Mercenário</option>
                                        <option value="Hunter Medicinal">Hunter Medicinal</option>
                                        <option value="Hunter Hacker">Hunter Hacker</option>
                                        <option value="Hunter Cabeça">Hunter Cabeça</option>
                                        <option value="Hunter de Informação">Hunter de Informação</option>
                                        <option value="Hunter Jackspot">Hunter Jackspot</option>
                                        <option value="Hunter Vírus">Hunter Vírus</option>
                                        <option value="Hunter da Juventudade e Beleza">Hunter da Juventudade e Beleza</option>
                                        <option value="Hunter Terrorista">Hunter Terrorista</option>
                                        <option value="Hunter de Venenos">Hunter de Venenos</option>
                                        <option value="Hunter Caçador">Hunter Caçador</option>
                                        <option value="Hunter Paleógrafo">Hunter Paleógrafo</option>
                                        <option value="Hunter Perdido">Hunter Perdido</option>
                                        <option value="Hunter Provisório">Hunter Provisório</option>
                                        <option value="Hunter Temporário">Hunter Temporário</option>
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
                                        <option value="">Defina o tipo de Nen</option>
                                        <option value="Reforço">Reforço</option>
                                        <option value="Emissão">Emissão</option>
                                        <option value="Transformação">Transformação</option>
                                        <option value="Manipulação">Manipulação</option>
                                        <option value="Materialização">Materialização</option>
                                        <option value="Especialização">Especialização</option>
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
                                        <option value="">Defina o tipo sanguíneo</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @error('tipo_sangue')
                                        <div class="alert alert-danger" role="alert"> 
                                            {{$message}}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" title="Cadastrar"><i class="fa fa-plus"></i>&nbsp;Cadastrar</button>
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