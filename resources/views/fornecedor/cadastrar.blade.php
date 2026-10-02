@extends('layout.site')

@section('main')
<div class="container mt-4">
    <h1 class="text-center">Cadastrar Fornecedores</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/fornecedor/salvar" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Fornecedor</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="textarea" class="form-control" name="site" value="{{ old('site') }}" required></textarea>
                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <select class="form-select" name="uf" id="uf" required>
                        <option value="SP" @selected(old('uf') === 'SP')>São Paulo</option>
                        <option value="MG" @selected(old('uf') === 'MG')>Minas Gerais</option>
                        <option value="GO" @selected(old('uf') === 'GO')>Goiás</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>	                
                <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
            </form>
        </div>
    </div>      
</div>
@endsection
