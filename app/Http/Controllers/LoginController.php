<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Utils\HashProvider;


class LoginController extends Controller
{
    public function login(Request $request) {
        $inputPassword =  $request->input('password');
        $foundUser = User::where('email', $request->input('email'))->first();
        if($foundUser != null && HashProvider::passwordsMatch($inputPassword, $foundUser->password)) {
            $request->session()->put('user', $foundUser);
            return redirect('/');
        }
        $request->session()->flush();
        return response('erro no login', 401);
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return response('Deslogado com sucesso', 200);
    }

    public function index() {
        return view('login');
    }
}
