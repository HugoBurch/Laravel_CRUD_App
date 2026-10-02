@extends('layout.site')

@section('main')
<div class="container mt-4">
    <h1 class="text-center">Editar Fornecedor</h1>
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
            <form action="/fornecedor/atualizar" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ isset($registro->id) ? $registro->id : '' }}">
                </div>
                <div class="form-group">
                    <label for="nome">Nome do Fornecedor</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome',$registro->nome) }}" required>
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="text" class="form-control" name="site" value="{{ old('site',$registro->site) }}" required>
                </div>
               <div class="form-group">
                    <label for="uf">UF</label>
                    <select class="form-select" name="uf" id="uf"  required>
                        <option value="SP" @selected(old('uf', $registro->uf) === 'SP')>São Paulo</option>
                        <option value="MG" @selected(old('uf', $registro->uf) === 'MG')>Minas Gerais</option>
                        <option value="GO" @selected(old('uf', $registro->uf) === 'GO')>Goiás</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $registro->email) }}" required>
                </div>                  
                <button type="submit" class="btn btn-success btn-sm mt-2">Atualizar</button>
            </form>
        </div>
    </div>      
</div>
@endsection
