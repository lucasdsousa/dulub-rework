@extends('layouts.app')

@section('content')

<style>
    #categorias {
        background: #F6F9FC;
    }
    #categorias:hover {
        background: red;
        color: white;
        transition: 0.4s;
    }
</style>

<x-navbar/>


<img src="images/Banner - Produtos.png" style="width:100%" alt="">

<div class="container mb-5 mt-3">
    <a class="text-decoration-none" href="/" style="color: red">HOME</a> > <a class="text-decoration-none text-dark" href="#">PRODUTOS</a>
</div>

<div clas="container mb-5">
    <h1 style="text-align: center; font-style: italic; color: red">Nossos Produtos</h1>
    <div class="container mt-4">
        <h5 class="mb-5" style="text-align: center; color:#A9ABAE">Mantenha o foco em seu destino, enquanto os produtos Dulub cuidam da performance, economia de combustível e longa vida útil do motor de seu veículo. 
                            A marca Dulub apresenta um portfólio completo de produtos automotivos para veículos leves.</h5>
    </div>
    
</div>

<div class="d-grid gap-2 col-9 mx-auto mb-5">
        @foreach($categorias as $c)
            <button class="btn" id="categorias" style="text-align:left; border-radius:0 !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $c->id }}" aria-expanded="false" aria-controls="collapse{{ $c->id }}">
                {{ $c->nomeCategoria }}
            </button>
            <div class="collapse mb-3" id="collapse{{ $c->id }}">
                    @foreach($produtos as $p)
                        @if($p->categoria_id == $c->id)
                <div class="card card-body mb-4" style="background-color: #F6F9FC; border-radius:0 !important">
                            <div class="row" style="background-color: #F6F9FC">
                                <div class="col">
                                    <img class="w-100 d-block" src="{{ asset($p->imagem) }}" alt="">
                                </div>
                                <div class="col-8 mt-5">
                                    <strong><h3>{{ $p->nome }}</h3></strong>
                                    <p style="text-align:justify; padding-right:50px">{{ $p->descricao }}</p>
                                    <p style="text-align:justify; padding-right:50px"><strong>Composição Química:</strong> {{ $p->comp_quimica }}</p>
                                    <p><strong>VISCOSIDADE:</strong> {{ $p->viscosidade }}</p>
                                    @if($p->categoria_id != 2)
                                        @if($p->id == 24)
                                            <img src="images/200ML, 500ML E 1L.svg" alt="" class="me-2 mb-5" style="width:20%; float:right;">
                                        @elseif($p->id == 25 || $p->id == 70)
                                            <img src="images/1L, 20L E 200L.svg" alt="" class="me-2 mb-5" style="width:20%; float:right;">
                                        @else
                                            <img src="images/1L E 200L.svg" alt="" class="me-2 mb-5" style="width:20%; float:right;">
                                        @endif
                                    @else
                                        @if($p->id == 20 || $p->id == 22)
                                            <img src="images/1L, 20L E 200L.svg" alt="" class="me-2 mb-5" style="width:20%; float:right;">
                                        @else
                                            <img src="images/1L, 5L, 20L E 200L.svg" alt="" class="me-2 mb-5" style="width:20%; float:right; margin-bottom:75px">
                                        @endif
                                    @endif
                                </div>
                                <div class="row" style="margin-top: -85px">
                                    <div class="col">
                                        <a class="btn me-3 mt-5" href="{{ asset($p->ficha) }}" download style="color:white; background-color:#333333; float:right; border-radius:0 !important">Ver Ficha Técnica<i class="fa-light fa-list-tree"></i></a>
                                        <a class="btn me-3 mt-5" href="#" style="color:white; background-color:red; float:right; border-radius:0 !important">BAIXAR FISPQ</a>
                                    </div>
                                </div>
                            </div>
                </div>
                        @endif
                    @endforeach
            </div>
        @endforeach
</div>

<img class="mb-5 d-block mx-auto" src="images/POWERED BY DULUB.png" alt="" style="width:15%;">


<x-footer/>

<script>
    $(document).on('click',function(){
    $('.collapse').collapse('hide');
    });
</script> 