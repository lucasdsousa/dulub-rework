@extends('layouts.app')

@section('content')

<style>
    #categoria {
        background: #e6e6e6;
    }

    #categoria:hover {
        background: red;
        color: white;
    }
</style>

<x-navbar />

<img src="images/Banner - Produtos.png" style="width:100%" alt="">

<div clas="container mb-5">
    <h1 class="mb-5" style="text-align: center; font-style: italic; color: red">{{ $categoria->nomeCategoria }}</h1>
</div>

<div class="d-grid gap-2 col-9 mx-auto mb-5">
            <button class="btn" id="categoria" style="text-align:left; border-radius:0 !important" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $categoria->id }}" aria-expanded="false" aria-controls="collapse{{ $categoria->id }}">
                {{ $categoria->nomeCategoria }}
            </button>
            <div class="collapse mb-3" id="collapse{{ $categoria->id }}">
                @foreach($produtos as $p)
                    <div class="card card-body mb-3" style="background-color: #e6e6e6; border-radius:0 !important">
                        @if($p->categoria_id == $categoria->id)
                            <div class="row" style="background-color: #e6e6e6">
                                <div class="col">
                                    <img class="w-100 d-block" src="{{ asset($p->imagem) }}" alt="">
                                </div>
                                <div class="col-8 mt-5">
                                    <strong><h3>{{ $p->nome }}</h3></strong>
                                    <p>{{ $p->descricao }}</p>
                                    <p><strong>Composição Química:</strong> {{ $p->comp_quimica }}</p>
                                    <p><strong>VISCOSIDADE:</strong> {{ $p->viscosidade }}</p>
                                    <img src="images/1L E 200L.svg" alt="" style="width:25%; float:right">
                                </div>
                                <div class="row mt-n5" style="margin-top: -100px">
                                    <div class="col">
                                        <a class="btn me-3 mt-5" href="#" style="color:white; background-color:#333333; float:right; border-radius:0 !important">Ver Ficha Técnica<i class="fa-light fa-list-tree"></i></a>
                                        <a class="btn me-3 mt-5" href="#" style="color:white; background-color:red; float:right; border-radius:0 !important">BAIXAR FISPQ</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
</div>

<img class="mb-5 d-block mx-auto" src="images/POWERED BY DULUB.png" alt="" style="width:100%;">

<x-footer />

@endsection