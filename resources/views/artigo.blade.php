@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
    <div class="row">
        <thumbnail 
            titulo="{{ $artigo->titulo }}" 
            conteudo="{{ $artigo->descricao }}" 
            img="https://www.grupoescolar.com/a/b/artigo-1F.jpg" 
            time="{{ Carbon\Carbon::parse($artigo->data)->diffForHumans() }}"
            mb="3"
            md="4"
            detalhe="/admin/artigos/"
            editar="/admin/artigos/"
            >
        </thumbnail>

    </div>
</pagina>
@endsection
