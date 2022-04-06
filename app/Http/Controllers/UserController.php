<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    // Impede que o usuario que não esta autenticado acesse o controle
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'create';
        $user = '';
        $route = 'user.store';
        $method = 'POST';
        return view('crud_users', compact('page', 'user', 'route', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome!',
            'email.email' => 'Digite um email válido!',
            'password.required' => 'A senha é obrigatório!'
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'cpf' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'sometimes|required|string|min:6|confirmed', // sometimes deixar valida so quando o registro password existir
        ], $mensagens);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $createUser = User::create($validatedData);

        return back()->with('success', 'Usuário criado com sucesso.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = 'edit';
        return view('crud_users', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = $id;
        $page = "edit";
        $route = 'user.update';
        $method = 'PUT';

        $findUserModel = app(User::class);
        $user = $findUserModel->find($id);

        return view('crud_users', compact('id','page', 'route', 'method', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome!',
            'email.email' => 'Digite um email válido!',
            'password.required' => 'A senha é obrigatório!'
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'cpf' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'sometimes|required|string|min:6|confirmed', // sometimes deixar valida so quando o registro password existir
        ], $mensagens);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::where('id', $id)->first();
        
        if($user) {
            $user->update($validatedData);
            return back()->with('success', 'Usuário editado com sucesso.');
        }else {
            return back()->with('error', 'Usuário não foi editado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
