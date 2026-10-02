<?php

use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use PhpParser\Node\Stmt\For_;


Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index']);
Route::get('/fornecedor/cadastrar',[FornecedorController::class,'cadastrar']);
Route::post('/fornecedor/salvar',[FornecedorController::class,'salvar']);
Route::get('/fornecedor/listar',[FornecedorController::class,'listar']);
Route::get('/fornecedor/editar/{id}',[FornecedorController::class,'editar']);
Route::get('/fornecedor/confirmaExcluir/{id}/{nome}', function($id, $nome){
    return view('fornecedor.confirmaExcluir', ['id' => $id, 'nome' => $nome]);
});
Route::delete('/fornecedor/excluir/{id}',[FornecedorController::class,'excluir']);
Route::post('/fornecedor/atualizar',[FornecedorController::class,'atualizar']);

Route::get('/produto/listar',[ProdutoController::class,'listar']);
Route::get('/produto/cadastrar',[ProdutoController::class,'cadastrar']);
Route::post('/produto/salvar',[ProdutoController::class,'salvar']);
Route::get('/produto/editar/{id}',[ProdutoController::class,'editar']);
Route::post('/produto/atualizar',[ProdutoController::class,'atualizar']);
Route::get('/produto/confirmaExcluir/{id}/{nome}', function($id, $nome){
    return view('produto.confirmaExcluir', ['id' => $id, 'nome' => $nome]);
});
Route::delete('/produto/excluir/{id}',[ProdutoController::class,'excluir']);

Route::get('/user',[UserController::class,'index']);
Route::post('/user/salvarnovo',[UserController::class,'salvarnovo']);
Route::post('/user/salvarEditado',[UserController::class,'salvarEditado']);
Route::post('/user/atualizarSenha',[UserController::class,'atualizarSenha']);
Route::post('/user/excluir',[UserController::class,'excluir']);


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/date', function () {
    return date("d/m/Y h:i:sa");
});

Route::get('/phpinfo', function () {
    return phpinfo();
});

