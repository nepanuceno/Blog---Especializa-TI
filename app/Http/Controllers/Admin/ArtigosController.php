<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Artigo;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $migalhas = json_encode([
            ['titulo'=>'Home', 'url'=>route('home')], 
            ['titulo'=>'Lista de Artigos', 'url'=>'']
        ]);

        $listaArtigos =  Artigo::select('id','titulo','descricao','data')->get();

        return view('admin.artigos.index', compact('migalhas','listaArtigos'));
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
            "titulo"=>"required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required"
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }



        try {
                Artigo::create($data);
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
        return Artigo::find($id);
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
        $validation = \Validator::make($data, [
            "titulo"=>"required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required"
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }



        try {
                Artigo::find($id)->update($data);
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
            Artigo::find($id)->delete();
            return redirect()->back();
    } catch (\PDOException $e) {
        return json_encode([ 'error'=>$e ]);
    }
    }
}
