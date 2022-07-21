<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Mostra página de autenticação de usuário
     *
     * @return view
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Mostra página de registro de usuário
     *
     * @return view
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Executa a autenticação do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function signin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        logger()->info('Login Incorreto', $request->all());
        return back()->withError('Usuário ou senha incorretos');
    }

    /**
     * Executa o registro do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function signup(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Executa o logout do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }










    public function criar(Request $request)
    {

        $attributes = $request->only([
            'name',
            'email',
            'phone',
            'id_number'
        ]);

        Client::create($attributes);

        return redirect('/dashboard')->with('success', 'Despesa criada com sucesso');
    }


    public function show( Client $client )
    {
        $result = $client;

        Client::where('id', '=', $result)->get();
    
        return $result;       
    }  


    public function name( $name )
    {

        $name = Client::where('name', '=', $name)
        ->first();
    
        return $name;       
    }  


    public function text( $text )
    {

        $text = Client::where('name', 'like', "%$text%")
        ->get();
    
        return $text;       
    }  


    public function bills( $client )
    {

        $client = Bill::where('client_id', '=', $client)->get();
    
        return $client;       
    }  


    public function caro( $value )
    {

        $value = Bill::where('value', '>', $value)->get();
    
        return $value;       
    } 

    
    public function values(  $value1, $value2 )
    {
        $value = Bill::where('value', '>', $value1)
        ->where('value', '<', $value2)
        ->get();
    
        return  $value;       
    }  


    public function order( $client  )
    {

        $client = Client::orderBy('name', 'asc')
        ->limit(2)
        ->get();
    
        return $client ;       
    }  

}