@extends('layouts.app')

@section('content')

<x-navbar/>

<div class="container mb-5">
    <a href="/">HOME</a> > <a href="#">PRODUTOS</a>
</div>

<div clas="container mb-5">
    <h1 style="text-align: center; font-style: italic; text-color: red">Nossos Produtos</h1>
    <h5 style="text-align: center">Mantenha o foco em seu destino, enquanto os produtos Dulub cuidam da performance, economia de combustível e longa vida útil do motor de seu veículo. 
                            A marca Dulub apresenta um portfólio completo de produtos automotivos para veículos leves.</h5>

</div>

<div class="container mb-5">
    <div class="accordion" id="accordionProducts">
        @foreach($categorias as $c)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $c->id }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $c->id }}" aria-expanded="true" aria-controls="collapse{{ $c->id }}">
                    <strong>{{ $c->nomeCategoria }}</strong>
                </button>
                </h2>
                <div id="collapse{{ $c->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $c->id }}" data-bs-parent="#accordionProducts">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h5 class="mt-5" style="text-align: center">POWERED BY DULUB</h5>
</div>
<x-footer/>