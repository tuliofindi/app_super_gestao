<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TesteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, "index"])->name('site.index');
Route::get('/contato', [ContatoController::class, "contato"])->name('site.contato');
Route::get('/sobre', [SobreController::class, "sobre"])->name('site.sobre');
Route::get('/login', function () {
    return "login";
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return "clientes";
    })->name('app.clientes');

    Route::get('/fornecedores', function () {
        return "fornecedores";
    })->name('app.fornecedores');

    Route::get('/produtos', function () {
        return "produtos";
    })->name('app.produtos');
});


Route::get('/soma/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::fallback(function () {
    return "<h1>Erro 404 | A página que você está tentando acessar não existe ou foi excluída. <a href=" . route('site.index') . ">Clique aqui</a> para voltar a página inicial! </h1>";
});

// Route::get('/route1', function () {
//     return view('site.route1');
// })->name('site.route1');

// Route::get('/route2', function () {
//     return redirect()->route('site.route1');
// });