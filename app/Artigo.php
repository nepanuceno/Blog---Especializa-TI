<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao','conteudo','data'];

    protected $date = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function listaArtigos($paginate){
        return DB::table('artigos')
        ->leftJoin('users','users.id','=','artigos.user_id')
        ->select('artigos.id','artigos.titulo','users.name','artigos.descricao','artigos.data')
        ->whereNull('deleted_at')
        ->paginate($paginate);
    }
    public static function listaArtigosSite($paginate){
        return DB::table('artigos')
        ->leftJoin('users','users.id','=','artigos.user_id')
        ->select('artigos.id','artigos.titulo','users.name as autor','artigos.descricao','artigos.data')
        ->whereNull('deleted_at')
        ->where('data','<=',date('Y-m-d'))
        ->orderBy('data','desc')
        ->paginate($paginate);
    }
    
}
