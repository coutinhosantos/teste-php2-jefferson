<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\Variacao;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = DB::table('produtos')
            ->join('variacaos', 'produtos.id', '=', 'variacaos.produto_id')
            ->get();

        return view('index',["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {        
        $produto            = new Produto();
        $produto->nome      = $req->input('nome');
        $produto->sku       = $req->input('sku');
        $produto->fotos     = $req->input('fotos');
        $produto->descricao = $req->input('descricao');
        $produto->save();
        
        //upload
        if($req->hasFile('fotos') && $req->file('fotos')->isValid()){
            $reqImage = $req->fotos;
            $extension = $reqImage->extension();
            $imagename = $produto->id.'-'.$produto->nome.'.'.$extension;
            $req->fotos->move('img/produto/'.$produto->id, $imagename);
            $produto->fotos = $imagename;
            $produto->save();    
        }

        Variacao::create([
            'estoque'=> $req->estoque,
            'preco'=> $req->preco,
            'tipo_variacao'=> $req->tipo_variacao,
            'descricao_variacao'=> $req->descricao_variacao,
            'produto_id'=>$produto->id,
        ]);
        
        $produtos = DB::table('produtos')
            ->join('variacaos', 'produtos.id', '=', 'variacaos.produto_id')
            ->get();

        return view('index',["produtos" => $produtos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        dd($produto);
        $variacao = Variacao::findOrFail($id);
        return view('produto-show',["produto" => $produto, "variacao"=>$variacao]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);      
        $variacao = Variacao::findOrFail($id);
        return view('produto-show',["produto" => $produto, "variacao"=>$variacao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->input('nome');
        $produto->sku = $request->input('sku');
        if(null!=$request->file('fotos')){
            $produto->fotos = $request->input('fotos');
            if($request->hasFile('fotos') && $request->file('fotos')->isValid()){
                $reqImage = $request->fotos;
                $extension = $reqImage->extension();
                $imagename = $produto->id.'-'.$request->input('nome').'.'.$extension;
                $request->fotos->move('img/produto/'.$produto->id, $imagename);
                $produto->fotos = $imagename;
                $produto->save();    
            }
        }
       
        $produto->descricao = $request->input('descricao');
        $produto->save();            
        $variacao = Variacao::findOrFail($id);
        $variacao->estoque = $request->input('estoque');
        $variacao->preco = $request->input('preco');
        $variacao->tipo_variacao = $request->input('tipo_variacao');
        $variacao->descricao_variacao = $request->input('descricao_variacao');
        $variacao->save();      

        $produtos = DB::table('produtos')
            ->join('variacaos', 'produtos.id', '=', 'variacaos.produto_id')
            ->get();

        return view('index',["produtos" => $produtos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        $produtos = Produto::paginate();
        return view('index',["produtos" => $produtos]);
    }
}