@include('layouts.app')


@section('content')

<style>
  .container-img {
    position: relative;
    width: 25%;
    margin-bottom:50px;
  }
  
  .image {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
  }
  
  .middle {
    position: absolute;
    top: 90%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
  }
  
  .container-img:hover .image {
    opacity: 0.3;
  }
  
  .container-img:hover .middle {
    opacity: 1;
  }
  
  .text {
    background-color: #04AA6D;
    color: white;
    font-size: 16px;
    padding: 16px 32px;
  }

  .img-centered {
    position: absolute;
    margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
  </style>

<x-navbar/>

<div id="carouselBanners" class="carousel slide carousel-fade mb-5" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/SITE IMAGE 07.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 02.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 04.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 05.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
    <img src="images/SETA ESQUERDA.svg" alt="" style="width:15%">
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
    <img src="images/SETA DIREITA.svg" alt="" style="width:15%">
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container mb-5">
  <h1 class="mb-4" style="color:red; text-align:center; font-style:bold"><strong>Mantenha o foco em seu destino</strong></h1>
  <h5 style="text-align:center; color:#A9ABAE">Enquanto os produtos Dulub cuidam da performance, economia de combustível e durabilidade do motor de seu veículo, a marca Dulub apresenta um
                                portfólio completo de produtos automotivos.</h5>
</div>



<div id="carouselCategorias" class="carousel slide mb-5" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselCategorias" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselCategorias" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselCategorias" data-bs-slide-to="2" aria-label="Slide 2"></button>
  </div>

  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="row container mx-auto">
        @foreach($cats as $c)
          @if($c->id < 5)
          <div class="container-img col">
            <img class="image" src="{{ asset($c->imagem) }}" alt="" style="width:100%">
            <div class="middle">
              <a class="btn d-block text-white text-nowrap" href="{{ route('produtos_categoria', $c->id) }}" style="background: red; font-weight: bold; border-radius: 0 !important; width:175px">{{ $c->nomeCategoria }}</a>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="carousel-item">
      <div class="row container mx-auto">
        @foreach($cats as $c)
          @if($c->id > 4 && $c->id < 9)
            <div class="container-img col">
              <img class="image" src="{{ asset($c->imagem) }}" alt="" style="width:100%">
              <div class="middle">
                <a class="btn d-block text-white text-nowrap" href="{{ route('produtos_categoria', $c->id) }}" style="background: red; font-weight: bold; border-radius: 0 !important; width:175px">{{ $c->nomeCategoria }}</a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="carousel-item">
      <div class="row container mx-auto">
        @foreach($cats as $c)
          @if($c->id > 8)
            <div class="container-img col">
              <img class="image" src="{{ asset($c->imagem) }}" alt="" style="width:100%">
              <div class="middle">
                <a class="btn d-block text-white text-nowrap" href="{{ route('produtos_categoria', $c->id) }}" style="background: red; font-weight: bold; border-radius: 0 !important; width:175px">{{ $c->nomeCategoria }}</a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategorias" data-bs-slide="prev">
    <img src="images/SETA ESQUERDA.svg" alt="" style="width:15%">
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselCategorias" data-bs-slide="next">
    <img src="images/SETA DIREITA.svg" alt="" style="width:15%">
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid">
  <img src="images/Banner - A MARCA QUE MAIS CRESCE.png" alt="" style="width:100%">
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col" style="background:#F6F9FC; align-items: right;">
      <h1 class="mt-5" style="text-align:right; margin-right:50px"><strong>QUER COMPRAR <br> LUBRIFICANTES DULUB <br> PARA SEU NEGÓCIO?</strong></h1>
      <br>
      <h5 style="text-align:right; margin-right:50px">Contate nossos distribuidores e garanta mais <br> proteção, produtividade e economia com os <br> lubrificantes Dulub.</h5>
      <br><br>
        <a class="btn mb-5" href="/Comprar-Dulub" style="color:white; background-color:red; float: right; margin-right:50px; border-radius:0 !important"><strong>FALE COM UM DE NOSSOS CONSULTORES</strong></a>
    </div>
    <div class="col" style="background:red">
      <h1 class="mt-5" style="color: white; margin-left:50px"><strong>QUERO VENDER <br> DULUB</strong></h1>
      <br><br><br>
      <h5 style="color: white; margin-left:50px">Conheça nossos distribuidores autorizados e <br> vire um parceiro da Dulub no Brasil.</h5>
      <br><br><br>
      <a class="btn mb-5" href="/Vender-Dulub" style="background-color: #F6F9FC; margin-left:50px; border-radius:0 !important"><strong>FALE COM NOSSA EQUIPE</strong></a>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="row align-items-center">
    <div class="col">
      <img class="d-block mx-auto" src="images/Logo Dunax H.png" alt="" style="width: 75%;">
      <h5 style="color:#A9ABAE; text-align:justify; margin-top:-30px">A Dunax impulsiona o seu trabalho diário, o futuro e o seu negócio. Para estar em contato com você, temos revendedores e distribuidores exclusivos no Brasil.
        <br>
        <br>
        Fundada em 2004 com o propósito de desenvolver lubrificantes de última geração para atender as necessidade e exigências dos seguimentos automotivos, industriais,
        agrícolas e de todos os demais que requisitem do lubrificante preço acessível, qualidade superior e tecnologia avançada.
      </h5>
      <br>
      <a class="btn" href="/Empresa" style="background-color:red; color:white; border-radius:0 !important; float: right;">Saiba mais</a>
    </div>
    <div class="col mt-5" style="margin-left:100px">
      <img src="images/FACHADA FÁBRICA - Imagem meramente ilustrativa.png" alt="" style="width: 100%">
    </div>
  </div>
</div>

<br>

<img src="images/Banner site - INSTA.png" alt="" style="width:100%; margin-bottom:-100px">
<a class="btn mt-3 mb-5" href="https://www.instagram.com/duluboficial/" target="_blank" style="background-color:red; color:white; border-radius:0 !important; margin-left:800px;">Ver perfil</a>

<strong><h1 class="mt-5 mb-5 text-center" style="color:red">Conheça nosso canal no YouTube</h1></strong>

<div class="container" style="display:flex; align-items:center; justify-content:center;">
  <iframe style="width:75%;" width="1366" height="482" src="https://www.youtube.com/embed/8UPTLako7oc" title="Dulub - Tecnologia Fluida" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<img class="mt-5" src="images/Banner - Renox Arla 32.png" alt="" style="width: 100%;">
<a class="btn" href="/Renox" style="color:white; background:#42B219; border-radius: 0 !important; margin-left:350px; margin-top:-175px"><strong>Saiba mais</strong></a>

<div class="container-fluid" style="background-color: white">
  <div class="container mb-5">
    <br><br><br>
    <h1 style="text-align: center; color: red">Supply Partners</h1>
  </div>

  <div id="carouselPartners" class="carousel slide mt-5" data-bs-ride="carousel" style="width:75%; margin-right:auto; margin-left:auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/Petrobras_horizontal_logo_(international).svg.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/ADNOC-Logo.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/CHEVRON - LOGO.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/acelem.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/AFTON CHEMICAL.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/DYM RESOURCES.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/PENTHOL-01.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/parceiros/quantiQmagenta.gif" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br>
</div>

<x-footer/>