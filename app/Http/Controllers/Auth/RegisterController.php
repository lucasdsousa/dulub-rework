<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'setor' => ['required', 'string'],
            'senha' => ['required', Rules\Password::min(8)
                                                        ->letters()
                                                        ->mixedCase()
                                                        ->numbers()
                                                        ->symbols()],
        ]);

        $user = new User();
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->setor = $request->input('setor');
        $user->approv = 1;
        $user->telemetria = 1 ? $request->input('Telemetria') == "Telemetria" : 0;
        $user->password = Hash::make($request->input('senha'));
        $user->save();

        /* $data = array('user' => $user);

        $gestor_email = DB::table('users')->select('email')->where('setor', '=', $request->input('setor'))->where('id', '<', 10)->get()->value('email');

        Mail::send(['text' => 'emails.register'], $data, function($message) use ($user, $request, $gestor_email) {
            $message->from($request->input('email'))
                    ->to($gestor_email)
                    ->replyTo($request->input('email'))
                    ->subject('Aprovação de Cadastro');
        }); */

        return redirect()->route('admin.show');
    }
    
    public function wait_for_approve() {
        return view('wait_for_approve');
    }
}
