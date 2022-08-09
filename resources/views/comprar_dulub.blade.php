@extends('layouts.app')

@section('content')
<style>
    .background {
        background-image: url('images/PLANO DE FUNDO - QUER COMPRAR.png');
        background-position: center;
        height:1500px;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
</style>

<x-navbar />


<div class="background">
    <div class="row container">
        <div class="col-6 mt-5" style="margin-left:750px">
            <div class="card" style="border-radius:0 !important">
                <div class="card-body">
                    <h3 style="color: red; text-align:center; font-style:bold"><strong>Quer mais informações sobre produtos Dulub?</strong></h3>
                    <p style="text-align:center; font-size:11px">Basta preencher o formulário abaixo:</p>
                    <form>
                        <div class="mb-3">
                            <strong><label for="nome" class="form-label">Nome</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="email" class="form-label">Email</label></strong>
                            <input type="email" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="tel" class="form-label">Telefone</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="uf" class="form-label">Estado</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="cidade" class="form-label">Cidade</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="empresa" class="form-label">Empresa</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <strong><label for="cnpj" class="form-label">CNPJ</label></strong>
                            <input type="text" class="form-control" style="border-radius:0 !important"ol" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <strong><label for="segmento" class="form-label">Sua empresa é do segmento de:</label></strong>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <strong><label for="cargo" class="form-label">Qual o seu cargo?</label></strong>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <strong><label for="segmento" class="form-label">Qual o tamanho da sua frota?</label></strong>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <p>Ao informar meus dados, eu concordo com a <a href="#">Política de Privacidade.</a></p>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" style="border-radius:0 !important" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1" style="font-size:12px">Eu concordo em receber comunicações.</label>
                        </div>
                        <button type="submit" class="btn mb-5 mt-3" style="background-color:red; color:white; border-radius:0 !important"><strong>Saiba onde encontrar produtos Dulub!</strong></button>
                        <p style="font-size:11px">Prometemos não utilizar suas informações de contato para enviar qualquer tipo de SPAM.</p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<x-footer />

@endsection