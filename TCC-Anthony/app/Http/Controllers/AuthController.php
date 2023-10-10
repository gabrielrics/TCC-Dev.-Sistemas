<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // This method will authenticate de login
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'requires|email',
            'password'=>'required',
        ]);

        //This Condition will attempt to authenticate with the database
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('/dashboard');//Muda o '/dashboard' pra página de home
        } else {
            return back()->withInput()->withErrors(['email' => 'Invalid Credencials']);
        };
    }

    //This method will create a User in the System
    public function signUp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'senha' => 'required|string|min:8'
        ]);

        $cadastro = new Cadastro();
        $cadastro->email = $request->email;//muda nome do campo pro nome do formulário
        $cadastro->nome = $request->nome;//muda nome do campo pro nome do formulário
        $cadastro->senha = $request->senha;//muda nome do campo pro nome do formulário
        $cadastro->save();

        // Redirecione o usuário para a página da home
        return redirect('/home')->with('success', 'Cadastro criado com sucesso!');
    }
}
