@include('layouts.app')

<nav class="navbar navbar-expand-lg shadow" style="background-color: black">
    <div class="container">
      <a class="navbar-brand" href="#" style="color: white">Dulub
        <!-- <img src="images/Logo - Dulub.png" alt="" style="width: 7%;"> -->
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
        <div class="hamburger-toggle">
          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </button>
      <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color: white">HOME</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white">A DUNAX</a>
          </li>

          <li class="nav-item dropdown dropdown-mega position-static">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="color: white">PRODUTOS</a>
            <div class="dropdown-menu shadow dropdown-center container-fluid">
              <div class="mega-content px-4">
                <div class="container">
                  <div class="row">
                    <div class="col">
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
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white">CATÁLOGOS</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white">RENOX ARLA 32</a>
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