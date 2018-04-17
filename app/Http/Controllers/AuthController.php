<?php

namespace App\Http\Controllers;

use App\Classes\AD;
use App\Http\Requests\LoginRequest;
use App\Model\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function attempt(LoginRequest $request)
    {
        $autServer  = new AD();

        $user = (object) $autServer->autenticarAD($request->login, $request->senha);
        $user = "teste";

        if ($user->estado) {
            $usuario = Usuario::where('login','=', $request->login)->first();

            if(is_null($usuario)):
                //cadastra
                $usuario = Usuario::create([
                    'nome' => $user->nome,
                    'login' => $user->matricula,
                    'senha' => bcrypt($request->senha),
                    'cargo' => null,
                    'status' => 1
                ]);
            endif;

            $remember =  $request->has('remember');
            if (Auth::loginUsingId($usuario->id, $remember))
            {
                return redirect()->route('home');
            }
        } else {
            return "Falha no login";
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/login');
    }
}
