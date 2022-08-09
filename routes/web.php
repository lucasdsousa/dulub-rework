<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $cats = DB::table('categorias')->get();

    return view('index', compact('cats'));
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/Empresa', function() {
    return view('empresa');
});
Route::get('/Catalogos', function() {
    return view('catalogos');
});

Route::get('/Renox', function() {
    return view('renox');
});

Route::get('/Comprar-Dulub', function() {
    return view('comprar_dulub');
});

Route::get('/Vender-Dulub', function() {
    return view('vender_dulub');
});

Route::get('/Produtos', [ProdutoController::class, 'index'])->name('produtos');
Route::get('/Produtos/{id}', [CategoriaController::class, 'index'])->name('produtos_categoria');

require __DIR__ . '/auth.php';
