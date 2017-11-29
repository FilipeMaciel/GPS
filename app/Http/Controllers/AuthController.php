<?php

namespace App\Http\Controllers;

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
        $autServer  = new \AD();

        $user = (object) $autServer->autenticarAD($request->login,$request->password);

        if ($user->estado) {
            $usuario = Usuario::where('login','=', $request->login)->first();

            if(is_null($usuario)):
                //cadastra
                Usuario::create([
                    'nome' => $user->nome,
                    'login' => $user->matricula,
                    'password' => bcrypt($request->password),
                    'email' => $user->email,
                    'cargo' => null,
                    'status' => 1
                ]);
            endif;
            if (Auth::attempt(['registry' => $request->registry, 'password' => $request->password]))
            {
                return redirect('')
            }
        } else {
            //falha no login
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/login');
    }
}
