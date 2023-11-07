@extends('templates.template_hunter')
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
                    <!-- Form -->
                    <form action="{{ url("create") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form_group">
                            <div class="form_group">
                                <div for="nome_hunter">Nome:
                                    <input type="text" class="form-control @error('nome_hunter') is-invalid @enderror" name="nome_hunter" placeholder="Digite o nome do Hunter" maxlength="50" value="{{ old('nome_hunter') }}">
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
                                    <input type="email" class="form-control @error('email_hunter') is-invalid @enderror" name="email_hunter" placeholder="Digite o e-mail do Hunter" maxlength="50" value="{{ old('email_hunter') }}">
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
                                    <input type="text" class="form-control @error('idade_hunter') is-invalid @enderror" name="idade_hunter" placeholder="Digite a idade do Hunter" onkeypress="$(this).mask('00', {reverse: true});" value="{{ old('idade_hunter') }}">
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
                                    <input type="text" class="form-control @error('altura_hunter') is-invalid @enderror" name="altura_hunter" placeholder="Digite a altura do Hunter"onkeypress="$(this).mask('0.00', {reverse: true});" value="{{ old('altura_hunter') }}">
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
                                    <input type="text" class="form-control @error('peso_hunter') is-invalid @enderror" name="peso_hunter" placeholder="Digite o peso do Hunter" onkeypress="$(this).mask('000.00', {reverse: true});" value="{{ old('peso_hunter') }}">
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
                                        <option {{ old('tipo_hunter') == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo sanguíneo') }}</option>
                                        @foreach($tipo_hunter as $th)
                                            <option {{ old('tipo_hunter') == $th->descricao ? 'selected' : '' }} value="{{ $th->descricao }}">{{ $th->descricao }}</option>
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
                                        <option {{ old('tipo_nen') == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo de nen') }}</option>
                                        @foreach($tipo_nen as $tn)
                                            <option {{ old('tipo_nen') == $tn->descricao ? 'selected' : '' }} value="{{ $tn->descricao }}">{{ $tn->descricao }}</option>
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
                                        <option {{ old('tipo_sangue') == '' ? 'selected' : '' }} value="">{{ __('Escolha o tipo sanguíneo') }}</option>
                                        @foreach($tipo_sanguineo as $ts)
                                            <option {{ old('tipo_sangue') == $ts->descricao ? 'selected' : '' }} value="{{ $ts->descricao }}">{{ $ts->descricao }}</option>
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
                                    @error('imagem_hunter.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtenha o botão "Cadastrar"
            const cadastrar_botao = document.querySelector('button[type="submit"]');

            // Adicione um evento de clique ao botão
            cadastrar_botao.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o envio do formulário

                confirmDelete('Cadastrar Hunter', 'Deseja cadastrar um novo Hunter?'); // Modal de confirmação
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
