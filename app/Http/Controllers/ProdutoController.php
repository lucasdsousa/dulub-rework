<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = DB::table('produtos')->get();
        $categorias = DB::table('categorias')->get();

        return view('produtos', compact('produtos', 'categorias'));
    }

    public function create() {
        //
    }

    public function store() {
        //
    }

    public function show($id) {
        //
    }
}
