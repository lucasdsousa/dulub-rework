@extends('layouts.app')

@section('content')

<x-navbar />

<img src="images/BANNER - CATÁLOGOS.png" style="width:100%" alt="">

<div class="container mb-5" style="margin-top: -55px">
    <a class="text-decoration-none" href="/" style="color: red">HOME</a> > <a class="text-decoration-none text-dark" href="#">CATÁLOGOS</a>
</div>

<div class="container">
    <h1 class="text-center mb-4" style="font-style:italic; color:red; font-size:48px"><strong>Catálogos</strong></h1>
    <h5 style="text-align: center; color:#A9ABAE">Baixe os nossos catálogos e conheça toda nossa linha de produtos.</h5>
</div>

<div class="container mt-5 mb-5">
    <div class="row align-items-center" style="align-items: center;">
        <div class="col">
            <img src="images/CAT 01.png" style="width:100%" alt="">
            <a class="btn text-white d-block mt-4" href="docs/Catálogo Dulub - Veículos Leves.pdf" style="background-color:red; margin:0 auto; width:75%; border-radius:0 !important" download>Download</a>
        </div>
        <div class="col">
            <img src="images/CAT 02.png" style="width:100%" alt="">
            <a class="btn text-white d-block mt-4" href="docs/Catálogo Dulub - Veículos Pesados.pdf" style="background-color:red; margin:0 auto; width:75%; border-radius:0 !important" download>Download</a>
        </div>
        <div class="col">
            <img src="images/CAT 03.png" style="width:100%" alt="">
            <a class="btn text-white d-block mt-4" href="docs/Catálogo Dulub - Motocicletas.pdf" style="background-color:red; margin:0 auto; width:75%; border-radius:0 !important" download>Download</a>
        </div>
        <div class="col">
            <img src="images/CAT 04.png" style="width:100%" alt="">
            <a class="btn text-white d-block mt-4" href="docs/Folder - Fluidos de Freios.pdf" style="background-color:red; margin:0 auto; width:75%; border-radius:0 !important" download>Download</a>
        </div>
        <div class="col">
            <img src="images/CAT 05.png" style="width:100%" alt="">
            <a class="btn text-white d-block mt-4" href="docs/Folder - Renox Arla 32.pdf" style="background-color:red; margin:0 auto; width:75%; border-radius:0 !important" download>Download</a>
        </div>
    </div>
</div>

<img class="mb-5 d-block mx-auto" src="images/POWERED BY DULUB.png" alt="" style="width:15%; margin-top:100px">

<x-footer />

@endsection