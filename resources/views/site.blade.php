@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
    <div class="row">

        @foreach ($lista as $artigo)
            
            <thumbnail 
                titulo="{{ $artigo->titulo }}" 
                conteudo="{{ str_limit($artigo->descricao,40,"(...)") }}" 
                img="https://www.grupoescolar.com/a/b/artigo-1F.jpg" 
                time="{{ Carbon\Carbon::parse($artigo->data)->diffForHumans() }}"
                mb="3"
                md="4"
                detalhe="/admin/artigos/"
                editar="/admin/artigos/"
                v-bind:item = "{id:{{$artigo->id}} }"
                >
            </thumbnail>
        @endforeach
    </div>
    {{ $lista }}

    <modal 
        nome="detalhe" 
        v-bind:titulo="$store.state.itens.titulo" 
        footer="sim" 
        cordafonte="text-dark" 
        estilo="background-color:rgba(255,255,255,0.8">
        <h4>
            @{{ $store.state.itens.descricao}}
        </h4>
        <h5>
            @{{ $store.state.itens.conteudo}}
        </h5>
    </modal>
</pagina>
@endsection
