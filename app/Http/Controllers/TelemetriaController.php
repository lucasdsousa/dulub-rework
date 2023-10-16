<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FiltroDriver;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;
#use GuzzleHttp\Psr7\Request;

class TelemetriaController extends Controller
{
    public function approve($id) {
        $user = User::find($id);

        $user->telemetria = 1;
        $user->save();

        return redirect()->route('admin.show');
    }
    public function index() {
        $groups = DB::connection('mysql_2')
                    ->table('cad_veiculo')
                    ->groupBy('cvei_obs')
                    ->get('cvei_obs');

        $plates = DB::connection('mysql_2')
                    ->table('cad_veiculo')
                    ->groupBy('cvei_placa')
                    ->get('cvei_placa');

        $login = DB::connection('mysql_2')
                    ->table('cad_motorista')
                    ->selectRaw('cmtr_login, cmtr_nome')
                    ->groupBy('cmtr_login')
                    ->get();
                    
        $user = Auth::user();
        
        if ($user->approv == 0) {
            return view('wait_for_approve');
        } else {
            if($user->telemetria == 1) {
                return view('telemetria.index', compact('groups', 'plates', 'login'));
            }
            else {
                return view('wait_for_approve');
            }
        }
    }

    public function filter(Request $request) {
        $data_I = $request->input('data_I');
        $data_F = $request->input('data_F');
        $group = $request->input('group');
        $plate_text = $request->input('plate_text');
        $plate_select = $request->input('plate_select');

        $horas_semana = 8;
        $horas_fds = 4;
        $hora_padrao = 0;

        //$date_interval = new DateInterval('P1D');
        //$periodo = new DatePeriod($data_I, $date_interval, $data_F);
        $periodo = CarbonPeriod::create($data_I, $data_F);

        $days = array();

        foreach($periodo as $p) {
            array_push($days, $p->format('l'));
        }
        
        //print_r($days);

        foreach($days as $d) {
            if ($d != "Sunday" && $d != "Saturday") {
                //print_r($horas_semana . " ");
                $hora_padrao += $horas_semana;
            }
            else if ($d == "Saturday") {
                //print_r($horas_fds . " ");
                $hora_padrao += $horas_fds;
            }
        }

        //print_r($hora_padrao . " ");

        if($group != null) {
            if($plate_select != null) {
                $query = DB::connection('mysql_2')
                            ->table('log_telemetria_veiculo')
                            ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                            ->selectRaw('cad_veiculo.cvei_obs as Grupo, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                            ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                            ->where('cad_veiculo.cvei_placa', '=', $plate_select)
                            ->where('cad_veiculo.cvei_obs', '=', $group)
                            ->groupBy('log_telemetria_veiculo.ltve_cvei_id')
                            ->orderBy('cad_veiculo.cvei_placa')
                            ->get();
            }
            else {
                $query = DB::connection('mysql_2')
                            ->table('log_telemetria_veiculo')
                            ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                            ->selectRaw('cad_veiculo.cvei_obs as Grupo, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                            ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                            ->where('cad_veiculo.cvei_obs', '=', $group)
                            ->groupBy('log_telemetria_veiculo.ltve_cvei_id')
                            ->orderBy('cad_veiculo.cvei_placa')
                            ->get();
            }
        }
        else {
            if($plate_text != null) {
                $query = DB::connection('mysql_2')
                            ->table('log_telemetria_veiculo')
                            ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                            ->selectRaw('cad_veiculo.cvei_obs as Grupo, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                            ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                            ->where('cad_veiculo.cvei_placa', '=', $plate_text)
                            ->groupBy('log_telemetria_veiculo.ltve_cvei_id')
                            ->orderBy('cad_veiculo.cvei_placa')
                            ->get();
            }
            else {
                $query = DB::connection('mysql_2')
                            ->table('log_telemetria_veiculo')
                            ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                            ->selectRaw('cad_veiculo.cvei_obs as Grupo, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                            ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                            ->groupBy('log_telemetria_veiculo.ltve_cvei_id')
                            ->orderBy('cad_veiculo.cvei_placa')
                            ->get();
            }
        }
        
        return view('telemetria.filtro', compact('query', 'hora_padrao'));
    }

    public function filter_driver(Request $request) {
        $data_I = $request->input('data_I');
        $data_F = $request->input('data_F');
        $login  = $request->input('login');

        $horas_semana = 8;
        $horas_fds = 4;
        $hora_padrao = 0;
        
        DB::statement('truncate consulta_telemetria_driver');

        //$date_interval = new DateInterval('P1D');
        //$periodo = new DatePeriod($data_I, $date_interval, $data_F);
        $periodo = CarbonPeriod::create($data_I, $data_F);

        $days = array();

        foreach($periodo as $p) {
            array_push($days, $p->format('l'));
        }
        
        //print_r($days);

        foreach($days as $d) {
            if ($d != "Sunday" && $d != "Saturday") {
                //print_r($horas_semana . " ");
                $hora_padrao = $horas_semana;
            }
            else if ($d == "Saturday" || $d == "Sunday") {
                //print_r($horas_fds . " ");
                $hora_padrao = $horas_semana;
            }
        }


        $query = DB::connection('mysql_2')
                    ->table('log_telemetria_motorista')
                    ->join('cad_motorista', 'log_telemetria_motorista.ltmo_login', '=', 'cad_motorista.cmtr_login')
                    ->selectRaw('log_telemetria_motorista.ltmo_data as Data, cad_motorista.cmtr_nome as Motorista, sum(log_telemetria_motorista.ltmo_distancia) as KMTotal, sum(log_telemetria_motorista.ltmo_consumo) as ConsumoTotal, sum(log_telemetria_motorista.ltmo_consumo) as ConsumoTotal, sum(log_telemetria_motorista.ltmo_distancia) / sum(log_telemetria_motorista.ltmo_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_motorista.ltmo_inf_vel_seco) as VelMax, sum(log_telemetria_motorista.ltmo_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_motorista.ltmo_inf_frenagem) as Frenagem, sum(log_telemetria_motorista.ltmo_tempo_movimento) as TempoMovimento, sum(log_telemetria_motorista.ltmo_tempo_motor) as TempoMotor')
                    ->where('cad_motorista.cmtr_nome', '=', $login)
                    ->whereBetween('log_telemetria_motorista.ltmo_data', [$data_I, $data_F])
                    ->groupBy('log_telemetria_motorista.ltmo_data')
                    ->get();
                                            
        $start_J = DB::connection('mysql_2')
                        ->table('log_diario_bordo_macro')
                        ->join('log_diario_bordo', 'ldbm_ldbo_id', '=', 'ldbo_id')
                        ->join('log_macro', 'lmac_id', '=', 'ldbm_lmac_id')
                        ->join('tab_tipo_macro', 'ttma_id', '=', 'lmac_ttma_id')
                        ->join('ctl_motorista_ativo', 'cmta_id', '=', 'ldbo_cmta_id')
                        ->join('ctl_veiculo_grupo', 'lmac_cvei_id', '=', 'cvgr_cvei_id')
                        ->join('cad_veiculo', 'lmac_cvei_id', '=', 'cvei_id')
                        ->selectRaw('distinct cmta_login as LOGIN, cmta_nome AS MOTORISTA, lmac_numero AS NUMERO, lmac_nome AS MACRO, ttma_descricao as TIPO_MACRO, lmac_data_gps AS DATA_HORA')
                        ->whereBetween('lmac_data_gps', [$data_I, $data_F])
                        ->where('lmac_nome', '=', 'Inicio de Jornada')
                        ->where('cmta_nome', '=', $login)
                        ->orderByRaw('ldbo_id, lmac_data_gps')
                        ->get();
              
        $start_A = DB::connection('mysql_2')
                        ->table('log_diario_bordo_macro')
                        ->join('log_diario_bordo', 'ldbm_ldbo_id', '=', 'ldbo_id')
                        ->join('log_macro', 'lmac_id', '=', 'ldbm_lmac_id')
                        ->join('tab_tipo_macro', 'ttma_id', '=', 'lmac_ttma_id')
                        ->join('ctl_motorista_ativo', 'cmta_id', '=', 'ldbo_cmta_id')
                        ->join('ctl_veiculo_grupo', 'lmac_cvei_id', '=', 'cvgr_cvei_id')
                        ->join('cad_veiculo', 'lmac_cvei_id', '=', 'cvei_id')
                        ->selectRaw('distinct cmta_login as LOGIN, cmta_nome AS MOTORISTA, lmac_numero AS NUMERO, lmac_nome AS MACRO, ttma_descricao as TIPO_MACRO, lmac_data_gps AS DATA_HORA')
                        ->whereBetween('lmac_data_gps', [$data_I, $data_F])
                        ->where('lmac_nome', '=', 'Inicio de Almoco')
                        ->where('cmta_nome', '=', $login)
                        ->orderByRaw('ldbo_id, lmac_data_gps')
                        ->get();
                                            
        $end_J = DB::connection('mysql_2')
                        ->table('log_diario_bordo_macro')
                        ->join('log_diario_bordo', 'ldbm_ldbo_id', '=', 'ldbo_id')
                        ->join('log_macro', 'lmac_id', '=', 'ldbm_lmac_id')
                        ->join('tab_tipo_macro', 'ttma_id', '=', 'lmac_ttma_id')
                        ->join('ctl_motorista_ativo', 'cmta_id', '=', 'ldbo_cmta_id')
                        ->join('ctl_veiculo_grupo', 'lmac_cvei_id', '=', 'cvgr_cvei_id')
                        ->join('cad_veiculo', 'lmac_cvei_id', '=', 'cvei_id')
                        ->selectRaw('distinct cmta_login as LOGIN, cmta_nome AS MOTORISTA, lmac_numero AS NUMERO, lmac_nome AS MACRO, ttma_descricao as TIPO_MACRO, lmac_data_gps AS DATA_HORA')
                        ->whereBetween('lmac_data_gps', [$data_I, $data_F])
                        ->where('lmac_nome', '=', 'Fim de Jornada')
                        ->where('cmta_nome', '=', $login)
                        ->orderByRaw('ldbo_id, lmac_data_gps')
                        ->get();
                                            
        $end_A = DB::connection('mysql_2')
                        ->table('log_diario_bordo_macro')
                        ->join('log_diario_bordo', 'ldbm_ldbo_id', '=', 'ldbo_id')
                        ->join('log_macro', 'lmac_id', '=', 'ldbm_lmac_id')
                        ->join('tab_tipo_macro', 'ttma_id', '=', 'lmac_ttma_id')
                        ->join('ctl_motorista_ativo', 'cmta_id', '=', 'ldbo_cmta_id')
                        ->join('ctl_veiculo_grupo', 'lmac_cvei_id', '=', 'cvgr_cvei_id')
                        ->join('cad_veiculo', 'lmac_cvei_id', '=', 'cvei_id')
                        ->selectRaw('distinct cmta_login as LOGIN, cmta_nome AS MOTORISTA, lmac_numero AS NUMERO, lmac_nome AS MACRO, ttma_descricao as TIPO_MACRO, lmac_data_gps AS DATA_HORA')
                        ->whereBetween('lmac_data_gps', [$data_I, $data_F])
                        ->where('lmac_nome', '=', 'Fim de Almoco')
                        ->where('cmta_nome', '=', $login)
                        ->orderByRaw('ldbo_id, lmac_data_gps')
                        ->get();
                        
        $entrada1 = [];
        $saida1 = [];
        $entrada2 = [];
        $saida2 = [];
        
        $array_macros = array();
        
        
        //dd($start_A);
        
        foreach($start_J as $sj) {
            //print_r("INICIO " . $sj->DATA_HORA . "\n");
            array_push($entrada1, $sj->DATA_HORA);
            
            $array_macros["Entrada1"] = $entrada1;
            
            //DB::insert('insert into consulta_telemetria_driver (nome, entrada1) values (?, ?)', [$login, $sj->DATA_HORA]);
        }
        
        foreach($start_A as $sa) {
            //print_r($sa->DATA_HORA . "\n");
            array_push($saida1, $sa->DATA_HORA);
            
            $array_macros["Saida1"] = $saida1;
            
            //DB::insert('insert into consulta_telemetria_driver (nome, saida1) values (?, ?)', [$login, $sa->DATA_HORA]);
        }
        
        if(sizeof($end_A) >= 1) {
            foreach($end_A as $ea) {
                //print_r($ea->DATA_HORA . "\n");
                array_push($entrada2, $ea->DATA_HORA);
                
                $array_macros["Entrada2"] = $entrada2;
                
                //DB::insert('insert into consulta_telemetria_driver (nome, entrada2) values (?, ?)', [$login, $ea->DATA_HORA]);
            }
        }
        else {
            foreach($start_A as $sa) {
                //print_r($sa->DATA_HORA . "\n");
                //array_push($saida1, $sa->DATA_HORA);
                
                $array_macros["Entrada2"] = $saida1;
                
                //DB::insert('insert into consulta_telemetria_driver (nome, entrada2) values (?, ?)', [$login, $sa->DATA_HORA]);
            }
        }
        
        if(sizeof($end_J) >= 1)
            foreach($end_J as $ej) {
                //print_r("FIM " . $ej->DATA_HORA . "\n");
                array_push($saida2, $ej->DATA_HORA);
                
                $array_macros["Saida2"] = $saida2;
                
                //DB::insert('insert into consulta_telemetria_driver (nome, saida2) values (?, ?)', [$login, $ej->DATA_HORA]);
            }
        else {
            foreach($start_A as $sa) {
                //print_r($sa->DATA_HORA . "\n");
                //array_push($saida1, $sa->DATA_HORA);
                
                $array_macros["Saida2"] = $array_macros["Entrada2"];
                
                //DB::insert('insert into consulta_telemetria_driver (nome, saida2) values (?, ?)', [$login, $sa->DATA_HORA]);
            }                                                                      
        }

        //DB::insert('insert into consulta_telemetria_driver (entrada1, saida1, entrada2, saida2) values (?, ?, ?, ?)', [$array_macros['Entrada1'], $array_macros['Saida1'], $array_macros['Entrada2'], $array_macros['Saida2']]);


        //$db_conn = mysqli_connect("localhost", "dulubc51_dunax", "*dUNAX()1452", "dulubc51_dunax");
        
        /* foreach ($array_macros as $key => $am) {
            //print_r($array_macros['Entrada1']);
            //print_r(array_chunk($am, 1));
            
            $val1 = mysqli_real_escape_string($db_conn, $am[0]);
            $val2 = mysqli_real_escape_string($db_conn, $am[1]);
            $val3 = mysqli_real_escape_string($db_conn, $am[2]);
            $val4 = mysqli_real_escape_string($db_conn, $am[3]);
            //print_r($row);
            $queryy ="insert into consulta_telemetria_driver (nome, entrada1, saida1, entrada2, saida2) values ('".$login."', '".$val1."', '".$val2."', '".$val3."', '".$val4."')";	
            mysqli_query($db_conn, $queryy);
            
            //DB::insert('insert into consulta_telemetria_driver (nome, entrada1, saida1, entrada2, saida2) values (?, ?, ?, ?)', [$login, $array_macros['Entrada1'], $array_macros['Saida1'], $array_macros['Entrada2'], $array_macros['Saida2']]);
        } */
        
        $datas = new FiltroDriver();
        $datas->entrada1 = json_encode($entrada1);
        $datas->saida1 = json_encode($saida1);
        $datas->entrada2 = json_encode($entrada2);
        $datas->saida2 = json_encode($saida2);
        $datas->save();
        
        $result = DB::table('filtro_drivers')->get();
        
        print_r($result);

        return view('telemetria.filtro_driver', compact('query', 'days', 'horas_semana', 'horas_fds', 'start_J'));
    }

    public function filter_plate(Request $request) {
        $data_I = $request->input('data_I');
        $data_F = $request->input('data_F');
        $plate_text = $request->input('plate_text');
        $plate_select = $request->input('plate_select');

        $horas_semana = 8;
        $horas_fds = 4;
        $hora_padrao = 0;

        //$date_interval = new DateInterval('P1D');
        //$periodo = new DatePeriod($data_I, $date_interval, $data_F);
        $periodo = CarbonPeriod::create($data_I, $data_F);

        $days = array();

        foreach($periodo as $p) {
            array_push($days, $p->format('l'));
        }
        
        //print_r($days);

        foreach($days as $d) {
            if ($d != "Sunday" && $d != "Saturday") {
                //print_r($horas_semana . " ");
                $hora_padrao += $horas_semana;
            }
            else if ($d == "Saturday") {
                //print_r($horas_fds . " ");
                $hora_padrao += $horas_fds;
            }
        }

        if($plate_select != null) {
            $query = DB::connection('mysql_2')
                        ->table('log_telemetria_veiculo')
                        ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                        ->leftJoin('log_telemetria', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'log_telemetria.ltel_cvei_id')
                        ->leftJoin('cad_motorista', 'log_telemetria.ltel_login', '=', 'cad_motorista.cmtr_login')
                        ->selectRaw('log_telemetria_veiculo.ltve_data as Data, cad_motorista.cmtr_nome as Motorista, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_movimento) as TempoMovimento, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                        ->where('cad_veiculo.cvei_placa', '=', $plate_select)
                        ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                        ->groupBy('log_telemetria_veiculo.ltve_data')
                        ->get();
        } else {
            $query = DB::connection('mysql_2')
                        ->table('log_telemetria_veiculo')
                        ->join('cad_veiculo', 'log_telemetria_veiculo.ltve_cvei_id', '=', 'cad_veiculo.cvei_id')
                        ->selectRaw('log_telemetria_veiculo.ltve_data as Data, cad_veiculo.cvei_placa as Placa, sum(log_telemetria_veiculo.ltve_distancia) as KMTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_consumo) as ConsumoTotal, sum(log_telemetria_veiculo.ltve_distancia) / sum(log_telemetria_veiculo.ltve_consumo) / 1000 as ConsumoMedio, sum(log_telemetria_veiculo.ltve_inf_vel_seco) as VelMax, sum(log_telemetria_veiculo.ltve_inf_vel_chuva) as VelMaxChuva, sum(log_telemetria_veiculo.ltve_inf_frenagem) as Frenagem, sum(log_telemetria_veiculo.ltve_tempo_movimento) as TempoMovimento, sum(log_telemetria_veiculo.ltve_tempo_motor) as TempoMotor')
                        ->where('cad_veiculo.cvei_placa', '=', $plate_text)
                        ->whereBetween('log_telemetria_veiculo.ltve_data', [$data_I, $data_F])
                        ->groupBy('log_telemetria_veiculo.ltve_data')
                        ->get();
        }
        
        
        return view('telemetria.filtro_plate', compact('query', 'hora_padrao'));
    }

    public function get_plate(Request $request, $id) {
        $q = $request->input('q');
        
        $plates = DB::connection('mysql_2')
                    ->table('cad_veiculo')
                    ->selectRaw('cad_veiculo.cvei_placa as Placa')
                    ->where('cad_veiculo.cvei_obs', '=', $q)
                    ->get();
        
        return $plates;
    }
}


        /* $months = array(
            "Janeiro" => "01",
            "Fevereiro" => "02",
            "Março" => "03",
            "Abril" => "04",
            "Maio" => "05",
            "Junho" => "06",
            "Julho" => "07",
            "Agosto" => "08",
            "Setembro" => "09",
            "Outubro" => "10",
            "Novembro" => "11",
            "Dezembro" => "12",
        );

        $years = [
            2023,
            2024,
            2025,
        ]; */
