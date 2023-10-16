@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container">
        <a href="/admin" class="btn btn-outline-danger mb-5" type="submit">Voltar</a>
    </div>
    
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response->data as $r)  
                    @if(in_array($r->id, $rotas_server))
                        <tr>
                        <th scope="row">{{ $r->id }}</th>
                        <td>{{ $r->name }}</td>
                        </tr>
                    @else 
                        <tr>
                        <th scope="row" style="color: red">{{ $r->id }}</th>
                        <td style="color: red">{{ $r->name }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection