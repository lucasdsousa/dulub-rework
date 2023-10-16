@extends('layouts.app')

@section('content')

            <x-navbar />

                <div class="container" style="margin-top:175px">

                    <div class="flex items-center justify-end mt-4 container" style="margin-top: 150px">                            
                        <a href="/admin" class="btn btn-outline-danger mb-5" type="submit">Voltar</a>
                    </div>
                    
                    <button class="btn btn-outline-primary mx-3" id="rel-geral" type="button">Relatório Geral</button>
                    
                    <button class="btn btn-outline-success mx-3" id="rel-driver" type="button">Individual Motorista</button> <span class="badge bg-secondary">Em Desenvolvimento</span>
                    <button class="btn btn-outline-danger mx-3" id="rel-plate" type="button">Individual Placa</button> <span class="badge bg-secondary">Em Desenvolvimento</span>
                </div>

                <div class="container">
                
                <div class="row">
                    <div class="col" id="div-geral" style="display: none">
                        <form class="mt-5" method="GET" action="{{ route('filtrar') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Data Address -->
                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Inicial</label>
                                <input class="form-control" id="data_I" class="block mt-1" type="date" name="data_I" required>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Final</label>
                                <input class="form-control" id="data_F" class="block mt-1" type="date" name="data_F" required>
                            </div>
                            
                            <div class="row mb-2" id="group">
                                <div class="col-sm-6">
                                    <label for="group">Grupo</label>
                                    <select class="form-select w-50" name="group" aria-label="Grupo">
                                        <option disabled>Grupo</option>
                                        @foreach($groups as $g)
                                            <option value="{{ $g->cvei_obs }}">{{ htmlspecialchars($g->cvei_obs) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2" id="plate_text">
                                <label for="plate_text">Placa</label>
                                <input list="plates" class="form-control" class="block mt-1" type="text" name="plate_text">

                                <datalist id="plates">
                                    @foreach($plates as $p)
                                        <option value="{{ $p->cvei_placa }}">{{ $p->cvei_placa }}</option>
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <button class="btn btn-info text-light ml-3 mb-5" type="submit">
                                    Buscar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col" id="div-motorista" style="display: none">
                        <form class="mt-5" action="{{ route('filtrar_motorista') }}" method="GET" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Inicial</label>
                                <input class="form-control" id="data_I" class="block mt-1" type="date" name="data_I" required>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Final</label>
                                <input class="form-control" id="data_F" class="block mt-1" type="date" name="data_F" required>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <label for="login">Motorista</label>
                                    <input list="drivers" type="text" name="login" id="login">
                                    
                                    <datalist id="drivers">
                                        <option disabled>Motorista</option>
                                        @foreach($login as $l)
                                            <option value="{{ $l->cmtr_nome }}">
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <button class="btn btn-info text-light ml-3 mb-5" type="submit">
                                    Buscar Motorista
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col" id="div-placa" style="display: none">
                        <form class="mt-5" method="GET" action="{{ route('filtrar_placa') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Data Address -->
                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Inicial</label>
                                <input class="form-control" id="data_I" class="block mt-1" type="date" name="data_I" required>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <label for="data_I">Data Final</label>
                                <input class="form-control" id="data_F" class="block mt-1" type="date" name="data_F" required>
                            </div>
                            <div class="col-sm-3 mb-2" id="plate_text">
                                <label for="plate_text">Placa</label>
                                <input list="plates" class="form-control" class="block mt-1" type="text" name="plate_text">
                                
                                <datalist id="plates">
                                    @foreach($plates as $p)
                                        <option value="{{ $p->cvei_placa }}">{{ $p->cvei_placa }}</option>
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <button class="btn btn-info text-light ml-3 mb-5" type="submit">
                                    Buscar Placa
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                </div>
        </div>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#group').on('change', function(){
                    var demovalue = $(this).val();

                    if(demovalue != "") {
                        $("#plate_select").hide();
                        $("#plate_text").hide();
                    }
                    else {
                        $("#plate_select").hide();
                        $("#plate_text").show();
                    }
                });
                
                $("#plate_select").on('change', function(){            
                    $("#plate_text").hide();          
                    $("#group").hide();
                });
                
                $("#plate_text").on('change', function(){            
                    $("#plate_select").hide();       
                    $("#group").hide();
                });
                
                $('#rel-geral').on('click', function(){             
                    $("#div-geral").show();         
                    $("#div-motorista").hide();   
                    $("#div-placa").hide();
                });

                $('#rel-driver').on('click', function(){    
                    $("#div-motorista").show();           
                    $("#div-geral").hide();   
                    $("#div-placa").hide();
                });

                $('#rel-plate').on('click', function(){      
                    $("#div-placa").show();        
                    $("#div-geral").hide();           
                    $("#div-motorista").hide();
                });
                
            });
        </script>

        <!--
        <script>
            function showUser(str) {
            if (str == "") {
                document.getElementById("plate_select").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("plate_select").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET","getuser.php?q="+str,true);
                xmlhttp.send();
            }
            }
        </script> -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@endsection