@extends('layout.site')

@section('main')
    <div class="container mt-4">
        <h1>Listagem de Produtos</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif        


        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <form action="/fornecedor/listar" method="GET">
                                <input type="search" placeholder="Pesquisar fornecedores..." id="site-search" name="pesquisa" />
                                <button>Search</button>
                        </form>
                        <th class="info">Id</th>
                        <th class="info">Nome</th>
                        <th class="info">Descrição</th>
                        <th class="info">UF</th>
                        <th class="info">Email</th>
                        <th class="info"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->descricao }}</td>
                            <td>{{ $registro->uf }}</td>
                            <td>{{ $registro->email }}</td>
                            <td>
                                <a href="/fornecedor/editar/{{ $registro->id }}" class="btn btn-info btn-sm">Editar</a>
                                <a href="/fornecedor/confirmaExcluir/{{ $registro->id }}/{{ $registro->nome }}"
                                    class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $registros->links('pagination::bootstrap-5') }}
        </div>
    </div>
          </tbody>
            </table>
        </div>
    </div>
@endsection