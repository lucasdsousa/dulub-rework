@include('layouts.app')

<style>
  .nav-hover:hover {
    background-color: red;
    transition: 0.5s
  }
</style>

<nav class="navbar navbar-expand-lg shadow fixed-top" style="background-color: black;">
    <div class="container">
      <a class="navbar-brand" href="/" style="">
        <img src="images/Logo DULUB.png" alt="" width="100" style="margin-left:-10px">
      </a>
      <div class="collapse navbar-collapse" id="navbar-content" style="margin-left:25px">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active me-4 text-nowrap" aria-current="page" href="/" style="color: red; font-size:14px">HOME</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link me-4 text-light nav-hover text-nowrap" href="/Empresa" style="font-size:14px">A DUNAX</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link me-4 link-light nav-hover text-nowrap" href="/Produtos" style="font-size:14px">PRODUTOS</a>
          </li>

          <!-- <li class="nav-item dropdown dropdown-mega position-static">
            <a class="nav-link dropdown-toggle me-4" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size:14px">PRODUTOS</a>
            <div class="dropdown-menu shadow dropdown-center container-fluid">
              <div class="mega-content px-4 container">
                <div class="container">
                  <div class="row container">
                    <div class="col container">
                      <a href="#" style="color:red">Veículos Leves</a>
                      <div>
                        <a class="list-group-item" href="#">Ultratech</a>
                        <a class="list-group-item" href="#">Supreme</a>
                        <a class="list-group-item" href="#">Probasic</a>
                        <a class="list-group-item" href="#">Fluidtech</a>
                        <a class="list-group-item" href="#">Unitech</a>
                      </div>
                      <hr class="dropdown-divider" style="width:150px">
                      <a href="#" style="color:red">Motocicletas</a>
                      <div>
                        <a class="list-group-item" href="#">Moto 4T</a>
                        <a class="list-group-item" href="#">Moto 2T</a>
                      </div>
                    </div>
                    <div class="col">
                      <a href="#" style="color:red">Veículos Pesados</a>
                      <div>
                        <a class="list-group-item" href="#">Turbotech</a>
                        <a class="list-group-item" href="#">Maxturbo</a>
                        <a class="list-group-item" href="#">Stopdiesel</a>
                      </div>
                      <hr class="dropdown-divider" style="width:100px">
                      <a href="#" style="color:red">Transmissões</a>
                      <div>
                        <a class="list-group-item" href="#">ATF</a>
                        <a class="list-group-item" href="#">TDH Tractor</a>
                        <a class="list-group-item" href="#">Totac</a>
                      </div>
                    </div>
                    <div class="col">
                      <a href="#" style="color:red">Engrenagens</a>
                      <div>
                        <a class="list-group-item" href="#">Hipóides Gl4</a>
                        <a class="list-group-item" href="#">Hipóides Gl5</a>
                      </div>
                      <hr class="dropdown-divider" style="width:100px">
                      <a href="#" style="color:red">Graxas</a>
                      <div>
                        <a class="list-group-item" href="#">Graxlub CA-2</a>
                        <a class="list-group-item" href="#">Dulub Rol MP-2</a>
                      </div>
                    </div>
                    <div class="col">
                      <a href="#" style="color:red">Industriais</a>
                      <div>
                        <a class="list-group-item" href="#">Hidráulico</a>
                        <a class="list-group-item" href="#">Refrigeração</a>
                        <a class="list-group-item" href="#">Compressores</a>
                        <a class="list-group-item" href="#">Térmicos</a>
                        <a class="list-group-item" href="#">Desmoldantes</a>
                        <a class="list-group-item" href="#">Têxtil</a>
                        <a class="list-group-item" href="#">Transformadores</a>
                      </div>
                    </div>
                    <div class="col">
                      <a href="#" style="color:red">Arla 32</a>
                      <div>
                        <a class="list-group-item" href="#">Renox ARLA32</a>
                      </div>
                      <hr class="dropdown-divider" style="width:100px">
                      <a href="#" style="color:red">Fluidos de Freios</a>
                      <div>
                        <a class="list-group-item" href="#">Dots</a>
                      </div>
                      <hr class="dropdown-divider" style="width:100px">
                      <a href="#" style="color:red">Super Aditivos</a>
                      <div>
                        <a class="list-group-item" href="#">Orgânicos</a>
                        <a class="list-group-item" href="#">Base MEG</a>
                        <a class="list-group-item" href="#">Água Bi Desm.</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link me-4 text-light nav-hover text-nowrap" href="/Catalogos" style="font-size:14px">CATÁLOGOS</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link me-4 text-light nav-hover text-nowrap" href="/Renox" style="font-size:14px">ARLA 32</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link me-4 text-light nav-hover" text-nowrap href="/Comercial" style="font-size:14px">COMERCIAL</a>
          </li>
          
          <!--
          <li class="nav-item">
            <a class="nav-link me-5 text-light nav-hover" href="http://dulub.servehttp.com:4040" style="font-size:14px; white-space: nowrap;">ÁREA RESTRITA</a>
          </li>-->
          
          <li class="nav-item">
            <strong><a class="nav-link text-light text-nowrap" href="https://www.instagram.com/duluboficial/" target="_blank" style="font-size:14px;"><i class="fab fa-instagram"></i> DULUBOFICIAL</a></strong>
          </li>
          
          <li class="nav-item">
            <a class="nav-link ms-2 btn text-light text-nowrap" href="/Trabalhe-Conosco" style="background-color:red; border-radius:0 !important; font-size:14px">TRABALHE CONOSCO</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    document.addEventListener('click',function(e){
      // Hamburger menu
      if(e.target.classList.contains('hamburger-toggle')){
        e.target.children[0].classList.toggle('active');
      }
    }) 
  </script>