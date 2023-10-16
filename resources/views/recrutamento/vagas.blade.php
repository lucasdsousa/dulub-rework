@extends('layouts.app')

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Salario</th>
        <th scope="col">Vagas</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jobs as $j)
          <tr>
              <th scope="row">{{ $j->id }}</th>
              <td>{{ $j->title }}</td>
              <td>{{ $j->salario }}</td>
              <td>{{ $j->vagas }}</td>
              <td><a href="{{ route('editar_vaga', $j->id) }}" class="btn btn-success btn-sm">Editar</a></td>
              <td>
                <form action="{{ route('apagar_vaga', $j->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <td><button class="btn btn-danger btn-sm" type="submit">Apagar</button></td>
                </form>
              </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  <a class="btn btn-primary" href="/Nova-Vaga">Cadastrar Vaga</a>
</div>