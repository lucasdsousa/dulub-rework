<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

@extends('layouts.app')

@section('content')
            <x-navbar />

                <div class="flex items-center justify-end" style="margin-top: 150px">
                    <a class="btn btn-danger mb-4 mx-3" href="/admin">Voltar</a>
                    <a class="btn btn-success mb-4 mx-3" href="/register">Novo Usuário</a>
                </div>

                <div class="container">
                    <table class="table table-hover sortable">
                        <thead>
                            <tr class="table-active">
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Telemetria</th>
                            <th scope="col">Rotas GR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->setor }}</td>
                                @if($u->telemetria == 0)
                                    <td>
                                        <form action="{{ route('telemetria_approve', $u->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-success">Aprovar</button>
                                        </form>
                                    </td>
                                @else
                                    <td style="font-style: italic"><strong>Autorizado</strong></td>
                                @endif

                                @if($u->rotas_gr == 0)
                                    <td>
                                        <form action="{{ route('rotasgr_approve', $u->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-success">Aprovar</button>
                                        </form>
                                    </td>
                                @else
                                    <td style="font-style: italic"><strong>Autorizado</strong></td>
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   
@endsection