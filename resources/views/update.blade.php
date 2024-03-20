@extends('templates.template_hunter')
@section('title', "Atualizar $hunter->nome_hunter")
@section('content')
    <div class="contained">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Atualizar {{ $hunter->nome_hunter }}
                            <a href="{{ url("/") }}" class="btn btn-secondary float-end" title="Retornar listagem"><i class="fa fa-arrow-left"></i>&nbsp;Retornar listagem</a>
                        </h4>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ url("update/$hunter->id") }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }} {{ csrf_field() }}
                        <div class="form_group">
                            <div class="form_group">
                                <div for="nome_hunter">Nome:
                                    <input type="text" class="form-control @error('nome_hunter') is-invalid @enderror" name="nome_hunter" placeholder="Digite o nome do Hunter" maxlength="50" value="{{ $hunter->nome_hunter }}">
                                    @error('nome_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="nome_hunter">E-mail:
                                    <input type="email" class="form-control @error('email_hunter') is-invalid @enderror" name="email_hunter" placeholder="Digite o e-mail do Hunter" maxlength="50" value="{{ $hunter->email_hunter }}">
                                    @error('email_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="idade_hunter">Idade:
                                    <input type="text" class="form-control @error('idade_hunter') is-invalid @enderror" name="idade_hunter" placeholder="Digite a idade do Hunter" onkeypress="$(this).mask('00', {reverse: true});" value="{{ $hunter->idade_hunter }}">
                                    @error('idade_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="altura_hunter">Altura:
                                    <input type="text" class="form-control @error('altura_hunter') is-invalid @enderror" name="altura_hunter" placeholder="Digite a altura do Hunter" onkeypress="$(this).mask('0.00', {reverse: true});" value="{{ $hunter->altura_hunter }}">
                                    @error('altura_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="peso_hunter">Peso:
                                    <input type="text" class="form-control @error('peso_hunter') is-invalid @enderror" name="peso_hunter" placeholder="Digite o peso do Hunter" onkeypress="$(this).mask('000.00', {reverse: true});" value="{{ $hunter->peso_hunter }}">
                                    @error('peso_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="tipo_hunter">Tipo de Hunter:
                                    <select class="form-control @error('tipo_hunter') is-invalid @enderror" name="tipo_hunter">
                                        <option {{ $hunter->tipo_hunter == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo de Hunter') }}</option>
                                        @foreach($tipo_hunter as $th)
                                            <option {{ $hunter->tipo_hunter == $th->descricao ? 'selected' : '' }} value="{{ $th->descricao }}">{{ $th->descricao }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_hunter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="tipo_nen">Tipo de Nen:
                                    <select class="form-control @error('tipo_nen') is-invalid @enderror" name="tipo_nen">
                                        <option {{ $hunter->tipo_nen == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo de nen') }}</option>
                                        @foreach($tipo_nen as $tn)
                                            <option {{ $hunter->tipo_nen == $tn->descricao ? 'selected' : '' }} value="{{ $tn->descricao }}">{{ $tn->descricao }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_nen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="tipo_sangue">Tipo sanguíneo:
                                    <select class="form-control @error('tipo_sangue') is-invalid @enderror" name="tipo_sangue">
                                        <option {{ $hunter->tipo_sangue == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo sanguíneo') }}</option>
                                        @foreach($tipo_sanguineo as $ts)
                                            <option {{ $hunter->tipo_sangue == $ts->descricao ? 'selected' : '' }} value="{{ $ts->descricao }}">{{ $ts->descricao }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_sangue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form_group">
                                <div for="imagem_hunter">Imagem:
                                    <input type="file" class="form-control @error('imagem_hunter.*') is-invalid @enderror" name="imagem_hunter[]" multiple>
                                    @foreach ($hunter->avatarHunter as $avatar)
                                        <img src="{{ asset($avatar->imagem) }}" height="100" width="100" style="margin: 5px">
                                    @endforeach
                                    @error('imagem_hunter.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" title="Atualizar"><i class="fa fa-arrows-rotate"></i>&nbsp;Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtenha o botão "Cadastrar
            const update_button = document.querySelector('button[type="submit"]');

            // Adicione um evento de clique ao botão
            update_button.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o envio do formulário

                // Chame a função confirmDelete() para exibir o modal
                confirmDelete('Atualizar Hunter', 'Deseja atualizar as informações do Hunter?');
            });

            function confirmDelete(title, text) {
                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Continue com a ação
                        document.querySelector('form').submit();
                    }
                });
            }
        });
    </script>
@endsection
