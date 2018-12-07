<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $migalhas = json_encode([
            ['titulo'=>'Administrador', 'url'=>route('admin')], 
            ['titulo'=>'Lista de Usuários', 'url'=>'']
        ]);

        $listaUsuarios =  User::select('id','name','email')->paginate(10);

        return view('admin.usuarios.index', compact('migalhas','listaUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validation = \Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        try {
                User::create($data);
                return redirect()->back();
        } catch (\PDOException $e) {
            return json_encode([ 'error'=>$e ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->all();

        if ( isset($data['password']) && $data['password'] != "" ) {

            $validation = \Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'password' => ['required', 'string', 'min:6'],
            ]);
        } else {
            $validation = \Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            ]);
            unset($data['password']);
        }

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        try {
                User::find($id)->update($data);
                return redirect()->back();
        } catch (\PDOException $e) {
            return json_encode([ 'error'=>$e ]);
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
        try {
            User::find($id)->delete();
            return redirect()->back();
        } catch (\PDOException $e) {
            return json_encode([ 'error'=>$e ]);
        }
    }
}
