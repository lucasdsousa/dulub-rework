@extends('layouts.app')

<form action="{{ route('save_vaga') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                
                                <div class="container">
                                        <label class="form-label" id="basic-addon1">Nome da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="title" aria-label="name" aria-describedby="basic-addon1" placeholder="Ex: Auxiliar Fiscal" required>
                                        </div>

                                        <label class="form-label" id="basic-addon2">Local de Contratação</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="local" aria-label="email" aria-describedby="basic-addon2" placeholder="Ex: Betim - MG" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Descrição da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="descricao" id="basic-url" aria-describedby="basic-addon3" placeholder="Ex: Lançamentos Contábeis, auxiliar na elaboração de balancetes, demais atividades pertinente ao setor." required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Requisitos da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="requisitos" id="basic-url" aria-describedby="basic-addon3" placeholder="Ex: Curso Técnico em Contabilidade, ou estar cursando Ciências Contábeis. Pacote Office, Excel Intermediário, Experiência na Função." required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Jornada da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="jornada" id="basic-url" aria-describedby="basic-addon3" placeholder="Segunda a Sexta-Feira, das 07:30 hs às 17:00 hs" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Benefícios da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="beneficios" id="basic-url" aria-describedby="basic-addon3" placeholder="Ex: Assistência médica, Assistência odontológica, Cesta básica, Vale-alimentação, Auxilio Combustível." required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Salário da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="salario" id="basic-url" aria-describedby="basic-addon3" placeholder="Ex: 1.800,00" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Quantidade de vagas</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="vagas" id="basic-url" aria-describedby="basic-addon3" placeholder="Ex: 2" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Cadastrar Vaga</button>                                        
                                        <a href="/Vagas" class="btn btn-danger">Voltar</a>
                                </div>
</form>