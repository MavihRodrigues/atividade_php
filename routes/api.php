<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('produto', [ProdutoController::class, 'store']);

Route::get('produto', [ProdutoController::class, 'index']);

Route::put('produto', [ProdutoController::class, 'update']);

Route::delete('produto/{id}', [ProdutoController::class, 'delete']);

Route::get('produto/{id}', [ProdutoController::class, 'show']);

Route::get('produto/find/name', [ProdutoController::class, 'findByName']);

Route::get('produto/find/maior', [ProdutoController::class, 'pesquisarValorMaiorQue']);

Route::get('produto/find/entre/valores', [ProdutoController::class, 'pesquisarEntreValores']);

Route::get('produto/find/produtos/apple', [ProdutoController::class, 'pesquisarProdutosApple']);

Route::get('produto/find/ano', [ProdutoController::class, 'pesquisarPorAno']);

Route::get('produto/find/mes', [ProdutoController::class, 'pesquisarPorMes']);

Route::post('cliente', [ClienteController::class, 'store']);