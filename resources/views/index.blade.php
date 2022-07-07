@include('layouts.app')


@section('content')

<style>
  .container-img {
    position: relative;
    width: 25%;
    left:100px;
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
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
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

<div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/IMAGE 01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 02.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/IMAGE 04.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container mb-5">
  <h1 style="color:red; text-align:center">Mantenha o foco em seu destino</h1>
  <h5 style="text-align:center">Enquanto os produtos Dulub cuidam da performance, economia de combustível e durabilidade do motor de seu veículo, a marca Dulub apresenta um
                                portfólio completo de produtos automotivos.</h5>
</div>

<div class="container"> 
  <div class="row align-items-center">
    @foreach($cats as $i)
          <div class="container-img col">
            <img class="image z-depth-4" src="{{ asset($i->imagem) }}" alt="" style="width:100%">
            <div class="middle">
              <a class="btn" href="/Categoria/{{ $i->id }}" style="background: red; font-weight: bold; color:white; width:100%">{{ $i->nomeCategoria }}</a>
            </div>
          </div>
    @endforeach
    <div class="col"></div>
  </div>
</div>

<div class="container-fluid">
  <img src="images/Banner - A MARCA QUE MAIS CRESCE.png" alt="" style="width:100%">
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col" style="background:#e6e6e6; align-items: right;">
      <h1 class="mt-5" style="text-align:right; margin-right:50px"><strong>QUER COMPRAR <br> LUBRIFICANTES DULUB <br> PARA SEU NEGÓCIO?</strong></h1>
      <br>
      <h5 style="text-align:right; margin-right:50px">Contate nossos distribuidores e garanta mais <br> proteção, produtividade e economia com os <br> lubrificantes Dulub.</h5>
      <br><br>
        <a class="btn btn-danger mb-5" href="#" style="float: right; margin-right:50px"><strong>FALE COM UM DE NOSSOS CONSULTORES</strong></a>
    </div>
    <div class="col" style="background:red">
      <h1 class="mt-5" style="color: white; margin-left:50px"><strong>QUERO VENDER <br> DULUB</strong></h1>
      <br><br><br>
      <h5 style="color: white; margin-left:50px">Conheça nossos distribuidores autorizados e <br> vire um parceiro da Dulub no Brasil.</h5>
      <br><br><br>
      <a class="btn mb-5" href="#" style="background-color: #e6e6e6; margin-left:50px"><strong>FALE COM NOSSA EQUIPE</strong></a>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="row align-items-center">
    <div class="col">
      <img src="images/Logo Dunax H.png" alt="" style="width: 75%">
      <h5 style="font-style: italic">A Dunax impulsiona o seu trabalho diário, o futuro e o seu negócio. Para estar em contato com você, temos revendedores e distribuidores exclusivos no Brasil.
        <br>
        <br>
        Fundada em 2004 com o propósito de desenvolver lubrificantes de última geração para atender as necessidade e exigências dos seguimentos automotivos, industriais,
        agrícolas e de todos os demais que requisitem do lubrificante preço acessível, qualidade superior e tecnologia avançada.
      </h5>
      <br><br>
      <a class="btn btn-danger btn-lg mt-3" href="#" style="float: right">Saiba mais</a>
    </div>
    <div class="col" style="margin-left:100px">
      <img src="images/imagem meramente ilustrativa.png" alt="" style="width: 100%">
      <br>
      <span>Imagem meramente ilustrativa</span>
    </div>
  </div>
</div>

<div class="container-fluid mt-5 mb-5" style="background-color:black">
  <div class="row align-items-center">
    <div class="col align-items-center">
      <h1 class="mt-5" style="color: red; text-align: center">As melhores dicas automotivas para você!</h1>
      <h5 style="color: white; text-align: center">Acompanhe nosso perfil no Instagram. Muitas dicas e informações para quem <br> trabalha no segmento ou tem paixão por carro. <br><br>
          Tem algum assunto que gostaria que fosse abordado em nosso perfil? <br>
          Simples! Envie um e-mail para <strong>marketing@dulub.com.br</strong> que te atenderemos sua solicitação!
          <br><br><br>
          <a class="btn btn-danger mb-5" href="#">Ver perfil</a>
      </h5>
    </div>
  </div>
</div>
<img class="mb-5" src="images/Imagem - Mão Celular  Instagram.png" alt="" style="width: 17%; position:absolute; margin-top:-498px; margin-left:150px">

<img class="mt-5" src="images/Banner - Renox Arla 32.png" alt="" style="width: 100%">

<div class="container-fluid" style="background-color: #F9F9FC">
  <div class="container mb-5">
    <br><br><br>
    <h1 style="text-align: center; color: red">Nossos Parceiros</h1>
    <p style="text-align: center">Confira os parceiros que entendem e recomendam nossos produtos</p>
  </div>

  <div id="carouselPartners" class="carousel slide mt-5" data-bs-ride="carousel" style="width:75%; margin-right:auto; margin-left:auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/ADNOC-Logo.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/petronas-logo-8.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/Petrobras_horizontal_logo_(international).svg.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/CHEVRON - LOGO.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
          <div class="col">
            <div style="background-color: white; width:150px; height:100px; display:flex; justify-content: center; align-items:center">
              <img src="images/LOGO- LUBRIZOL.png" class="d-block" alt="..." style="width:85%">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br>
</div>

<x-footer/>