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
                <div class="container mx-auto" style="margin-top: 150px">
                    <h1 class="mx-auto">Relatório Motorista</h1>
                </div>

                <div class="container" style="margin-top: 50px">
                    <a class="btn btn-danger mb-4 mx-3" href="/Telemetria">Voltar</a>
                </div>

                <div class="container">
                    <table class="table table-hover sortable">
                        <thead>
                            <tr class="table-active">
                            <th scope="col">Data</th>
                            <th scope="col">Motorista</th>
                            <th scope="col">Km Total</th>
                            <th scope="col">Consumo Total</th>
                            <th scope="col">Consumo Médio</th>
                            <th scope="col">Vel Max</th>
                            <th scope="col">Vel Max Chuva</th>
                            <th scope="col">Frenagem</th>
                            <th scope="col">Hora Utilizada</th>
                            <th scope="col">Hora Padrão</th>
                            <th scope="col">Índice Utilização</th>
                            <th scope="col">Teste</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($query as $q)
                                <tr>
                                <td><strong>{{ date('d/m/Y', strtotime($q->Data)) }}</strong></td>
                                <td>{{ $q->Motorista }}</td>
                                <td>{{ number_format(round($q->KMTotal / 1000), 0, ',', '.') }}</td>
                                <td>{{ number_format(round($q->ConsumoTotal, 0), 0, ',', '.') }} L</td>
                                <td>{{ number_format(round($q->ConsumoMedio, 2), 2, ',') }} L</td>
                                <td>{{ $q->VelMax }}</td>
                                <td>{{ $q->VelMaxChuva }}</td>
                                <td>{{ $q->Frenagem }}</td>
                                @php
                                    $sec = $q->TempoMotor % 60;
                                    $min = (($q->TempoMotor) / 60) % 60;
                                    $hour = floor($q->TempoMotor / 3600);
                                    $full = $hour.":".substr("0".$min,-2);

                                    if(date('l', strtotime($q->Data)) == "Saturday" || date('l', strtotime($q->Data)) == "Sunday") {
                                        $hora_padrao = 4;
                                    }
                                    else {
                                        $hora_padrao = 8;
                                    }
                                    
                                    $hora_padrao_secs = $hora_padrao * 3600;
                                    $indice = $q->TempoMotor / $hora_padrao_secs;
                                @endphp
                                <td>{{ $full }}</td>
                                <td>{{ $hora_padrao }}:00</td>
                                <td>{{ round($indice * 100, 2) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        
        <script>
            const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

            const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
                v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
                )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

            // do the work...
            document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
            const table = th.closest('table');
            const tbody = table.querySelector('tbody');
            Array.from(tbody.querySelectorAll('tr'))
                .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
                .forEach(tr => tbody.appendChild(tr) );
            })));
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@endsection

    

