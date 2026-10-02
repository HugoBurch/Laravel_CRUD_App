@extends('layout.site')

@section('main')
<div class="container mt-4">
    <h1 class="text-center">Excluir Fornecedor</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-danger text-white">
                <div class="card-header">
                    <h5>Confirmação de Exclusão do Fornecedor</h5>
                </div>
                <div class="card-body">
                    <p>Tem certeza de que deseja excluir o Fornecedor: <strong>{{ $nome }}</strong>?</p>
                </div>
                <div class="card-footer text-end">  
                        <form action="/fornecedor/excluir/{{ $id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Confirmar</button>
                        <a href="/fornecedor/listar" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>      
</div>
@endsection
