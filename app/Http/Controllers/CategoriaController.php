<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index($id) {
        $categoria = Categoria::find($id);
        $produtos = DB::table('produtos')->where('categoria_id', $categoria->id)->get();


        return view('produtos_categoria', compact('produtos', 'categoria', 'id'));
    }
}
