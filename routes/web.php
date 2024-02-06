<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::resource('produtos', 'ProdutosController');

Route::get('/', function () {

    $produto = Produto::paginate();
    
    if(null!=$produto){
        $produtos = DB::table('produtos')
            ->join('variacaos', 'produtos.id', '=', 'variacaos.produto_id')
            ->get();
        return view('index',["produtos" => $produtos]);
    }else{
        return view('index');
    }
});

Route::get('/produto', function () {
    $produtos = DB::table('produtos')
            ->join('variacaos', 'produtos.id', '=', 'variacaos.produto_id')
            ->get();

    return view('index',["produtos" => $produtos]);
});

Route::post('/cadastrar-produtos', 'App\Http\Controllers\ProdutosController@store');
Route::get('/editar-produtos/{id}', 'App\Http\Controllers\ProdutosController@edit');
Route::post('/alterar-produtos/{id}', 'App\Http\Controllers\ProdutosController@update');
Route::get('/excluir-produto/{id}', 'App\Http\Controllers\ProdutosController@destroy');