<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request)
    { //o Request grava a requisição da rota, captura os dados e reproduz no banco
        $produto = Produto::create([
            'nome' => $request->nome,        //}
            'marca' => $request->marca,      //}dados
            'valor' => $request->valor       //}
        ]);

        return response()->json([
            'status' => true,
            'message' => 'cadastrado',
            'data' => $produto
        ]);
    }

    public function index()  //index-->trazer todos os dados
    {  //index->retorna todos os dados
        $produtos = Produto::all();  //all->trás todos os dados que tem na tabela

        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function update(Request $request)
    {
        $produto = Produto::find($request->id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        if (isset($request->nome)) {
            $produto->nome = $request->nome;
        }

        if (isset($request->marca)) {
            $produto->marca = $request->marca;
        }

        if (isset($request->valor)) {
            $produto->valor = $request->valor;
        }


        $produto->update();

        return response()->json([
            'status' => true,
            'message' => 'atualizado'
        ]);
    }

    public function delete($id)
    {  //($id)-->procurar por id
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        $produto->delete();

        return response()->json([
            'status' => true,
            'message' => 'excluído'
        ]);
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    public function findByName(Request $request)
    {
        $produtos = Produto::where('nome', 'like', '%' . $request->nome . '%')->get(); //get->monta uma rede de produtos

        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisarValorMaiorQue(Request $request){
        $produtos = Produto::where('valor', '>=', $request->valor)->get();

        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisarEntreValores(Request $request){
        $produtos = Produto::whereBetween('valor', [$request->valorInicial, $request->valorFinal])->get();

        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisarProdutosApple(Request $request){
        $produtos = Produto::where('marca', '=', $request->marca)->get();

        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisarPorAno(Request $request){
        $produtos = Produto::whereYear('created_at', '=', $request->ano)->get();
        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisarPorMes(Request $request){
        $produtos = Produto::whereMonth('created_at', '=', $request->mes)->get();
        if($produtos->isEmpty())
        return response()->json([
            'status' => false,
            'message' => "Sem resultados para a pesquisa"
        ]);


        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }
}