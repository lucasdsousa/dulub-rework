<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $login = Auth::user();

        return view('admin.index', compact('login'));
    }

    public function create() {
        return redirect()->route('register');
    }

    public function show() {
        $login = Auth::user();
        $users = DB::table('users')->get();

        return view('admin.users', compact('users', 'login'));
    }

    public function approve(Request $request, $id) {
        $user = User::find($id);

        $user->approv = 1;
        $user->save();

        return redirect()->route('admin.show');
    }

    public function reprove(Request $request, $id) {
        $user = User::find($id);

        $user->destroy($id);

        return redirect()->route('admin.show');
    }
}
