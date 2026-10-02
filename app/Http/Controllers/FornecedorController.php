<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
Class FornecedorController extends Controller{
    public function cadastrar(){
        return view('fornecedor.cadastrar');
    }
    public function listar(Request $req){
            $consulta = Fornecedor::query();
            $pesquisa = $req->input('pesquisa');
            
            if ($pesquisa) {
                $consulta->where(function ($query) use ($pesquisa) {
                    $query->where('nome', 'like', "%{$pesquisa}%")
                        ->orWhere('site', 'like', "%{$pesquisa}%")
                        ->orWhere('uf', 'like', "%{$pesquisa}%")
                        ->orWhere('email', 'like', "%{$pesquisa}%");
                });
            }

            $registros = $consulta->paginate(10)->withQueryString();

            return view('fornecedor/listar', compact('registros'));

    }


     public function salvar(Request $req){

        // Validação com mensagens personalizadas
        $req->validate([
            'nome' => 'required|max:255',
            'site' => 'required|max:255',
            'uf' => 'required|max:2',
            'email' => 'required|max:255',
            ], [
            'nome.*' => 'O campo Nome é obrigatório e deve ter no máximo 200 caracteres!',
            'site.required' => 'O campo Site é obrigatório!',
            'uf.required' => 'O campo UF é obrigatório!',
            'email.required' => 'O campo Email é obrigatório!'
        ]
        );

        
        Fornecedor::create($req->all());

        return redirect('/fornecedor/listar')->with('success', 'Fornecedor gravado com sucesso!');

    }
    public function editar(string $id){
    
        $registro = Fornecedor::find($id);
        return view('fornecedor.editar',compact('registro'));
    }

    public function atualizar(Request $req){

        // Validação com mensagens personalizadas
        // Validação com mensagens personalizadas
        $req->validate([
            'nome' => 'required|max:255',
            'site' => 'required|max:255',
            'uf' => 'required|max:2',
            'email' => 'required|max:255',
            ], [
            'nome.*' => 'O campo Nome é obrigatório e deve ter no máximo 200 caracteres!',
            'site.required' => 'O campo Site é obrigatório!',
            'uf.required' => 'O campo UF é obrigatório!',
            'email.required' => 'O campo Email é obrigatório!'
        ]
        );
        //Atualiza os dados no Banco
        Fornecedor::find($req->input('id'))->update($req->all());  
        
        return redirect('/fornecedor/listar')->with('success', 'Fornecedor atualizado com sucesso!');
    }
    

    public function excluir($id){
    
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return redirect('/fornecedor/listar')->with('success', 'Fornecedor excluído com sucesso!');
    }
}