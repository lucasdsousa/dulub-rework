@extends('layouts.app')

<form action="{{ route('update_vaga', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                
                                <div class="container">
                                        <label class="form-label" id="basic-addon1">Nome da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="title" aria-label="name" aria-describedby="basic-addon1" placeholder="{{ $job->title }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon2">Local de Contratação</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="local" aria-label="email" aria-describedby="basic-addon2" placeholder="{{ $job->local }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Descrição da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="descricao" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->descricao }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Requisitos da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="requisitos" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->requisitos }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Jornada da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="jornada" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->jornada }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Benefícios da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="beneficios" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->beneficios }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Salário da Função</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="salario" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->salario }}" required>
                                        </div>

                                        <label class="form-label" id="basic-addon3">Quantidade de vagas</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="vagas" id="basic-url" aria-describedby="basic-addon3" placeholder="{{ $job->vagas }}" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Editar Vaga</button>
                                        <a class="btn btn-danger" href="/Vagas">Cancelar</a>
                                </div>
</form>