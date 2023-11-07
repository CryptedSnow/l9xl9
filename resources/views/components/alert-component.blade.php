{{-- @if ($mensagem = Session::get('success_store'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensagem }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($mensagem = Session::get('success_update'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <p>{{ $mensagem }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($mensagem = Session::get('success_destroy'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $mensagem }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($mensagem = Session::get('export_pdf_error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>{{ $mensagem }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

@if (session('success_store'))
    <script>
        Swal.fire({
            title: 'Registro criado',
            text: '{{ session('success_store') }}',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@elseif (session('success_update'))
    <script>
        Swal.fire({
            title: 'Registro atualizado',
            text: '{{ session('success_update') }}',
            icon: 'info',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@elseif (session('success_trash'))
    <script>
        Swal.fire({
            title: 'Registro enviado a lixeira',
            text: '{{ session('success_trash') }}',
            icon: 'warning',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@elseif (session('success_restored'))
    <script>
        Swal.fire({
            title: 'Registro restaurado',
            text: '{{ session('success_restored') }}',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@elseif (session('success_destroy'))
    <script>
        Swal.fire({
            title: 'Registro excluído',
            text: '{{ session('success_destroy') }}',
            icon: 'error',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@elseif (session('export_pdf_error'))
    <script>
        Swal.fire({
            title: 'Erro ao exportar para PDF',
            text: '{{ session('export_pdf_error') }}',
            icon: 'error',
            timer: 5000,
            showConfirmButton: false,
            allowOutsideClick: true
        });
    </script>
@endif
