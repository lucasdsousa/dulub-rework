<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class VuuptGRController extends Controller
{
    public function approve($id) {
        $user = User::find($id);

        $user->rotas_gr = 1;
        $user->save();

        return redirect()->route('admin.show');
    }

    public function index() {
        $user = Auth::user();

        $today = date('Y-m-d');
        $week = date('Y-m-d', strtotime('-7 days', strtotime($today)));

        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MzcxZDcyYi0xZTVjLTQ2OGYtOTRmNi02YjM0Yzk2NDg3N2MiLCJqdGkiOiI1MGM2OThjOTEzYzUwYWMyNmUyZmI4YzhkNzc2OGIyMWQ2MjQ3MWEyMTc0YTgzYjMyNzcwYmU4MTkyYTFmZDBkYTFlZWY0ZWU0NmEyMzdiMSIsImlhdCI6MTY4MTM5NTA4Ny44MDIxMDQsIm5iZiI6MTY4MTM5NTA4Ny44MDIxMDcsImV4cCI6NDgzNzA2ODY4Ny43OTIyMTgsInN1YiI6Ijk0ODEiLCJzY29wZXMiOltdfQ.q1pV2OTC7eDt_lYHstJeFnpsTUQkkwYZ9xBtZShBqcFwvMAQoVaazEbnOsqv-6DAr0yu6YRVnPaevdzVbToc73UtgbZJZrGwOPwOVkyOgtIXqY3__dM_heZNvhdZ6OFzJGVGY4JG1b662j1TWbrdBRthKqAqhlVL_6yrcSGLMCABcL761rhxYoJYUVfk7nTD35yWlH5oaZMfSllHgnUOIEfqRVzN4b0goY-zj7Yfo2MP27RWaTeKAaJ3jciR4F0AJ-kJPfc11GuPlEyq-CzQLs2NmXNAbBfWqBBu2snY6Jo6dtcDw_dAheO3m92cOkrGvKy1DQFDeFze2RlybdOhZDvcbDPgmH_bDU4nmxGLhsLWtlt2R7X8hler2n7TL8PE4w8SZ55BhrtWpKzIZJM1xQO9RCMGdKeFhC8cz0f3JhuNH9ejd0G6xYjEtnRYkklzYiYy9_-Mhgl35SsPJ4JRVlJRKGTMhmmULhbuLXoLfFe8HNVHwM9YXQcK7gAQQiI0WESjmqH3O0ll9XwtY6QyJ7dHolQz1gP-ZdcbU54yNw49Kw3Gv4tvKoj1m7kjh8-sJN8XyLeAestmVp95aVaG9jFSNfRT28X-R8q-PqLdKupLElpYs4QxaJQtndiggzT-nvXslz0B2Jq1VHTjUAhOxWLM7jxl5Erdor_oxAC-d8s';
        $rotas = 'https://api.vuupt.com/api/v1/routes?filter[0][field]=created_at&filter[0][operator]=gte&filter[0][value]=' . $week;

        $response = Http::withToken($token)->timeout(600)->get(urldecode($rotas))->object();

        //dd($response);
        
        $server = DB::connection('mysql_3')->table('rotas')->select('idRota')->get();
        $rotas_server = [];

        foreach($server as $s) {
            array_push($rotas_server, $s->idRota);
        }

        //print_r($rotas_server[1031]);

        if($user->rotas_gr == 1) {
            return view('rotas_gr.rotas', compact('response', 'rotas_server'));
        }
        else {
            return view('wait_for_approve');
        }
    }
}
