@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <migalhas v-bind:itens="{{ $migalhas }}"></migalhas>

    <painel titulo="PAINEL" tamanho="12" cor="bg-dark" fontcolor="text-dark">
        <div class="row">
            {{-- <painel titulo="Sub-Painel" conteudo="Painel 3"  subtitulo="UM" cor="bg-warning" fontcolor="text-dark" tamanho="4"> </painel>
            <painel titulo="Sub-Painel" conteudo="Painel 4"  subtitulo="DOIS" cor="bg-success" fontcolor="text-danger" tamanho="4"> </painel>
            <painel titulo="Sub-Painel" conteudo="Painel 5" subtitulo="TRES" cor="bg-info" fontcolor="text-dark" tamanho="4"></painel>
            <painel titulo="Sub-Painel" conteudo="Painel 6" subtitulo="QUATRO" cor="bg-danger" fontcolor="text-success" tamanho="4"> </painel> --}}
            <caixa tamanho="4" icon="ion ion-bag" cor="bg-dark" valor="150" titulo="Artigos" fontcolor="text-white" textfooter="Mais Informações" link="{{ route('artigos.index')}}"></caixa>
            <caixa tamanho="4" icon="fa fa-users" cor="bg-success" valor="45" titulo="Usuários" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="fa fa-tags" cor="bg-info" valor="150" titulo="Categorias" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="fa fa-user" cor="bg-warning" valor="150" titulo="Autores" fontcolor="text-dark" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="ion ion-bag" cor="bg-dark" valor="150" titulo="Itens" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="ion ion-bag" cor="bg-dark" valor="150" titulo="Itens" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="ion ion-bag" cor="bg-dark" valor="150" titulo="Itens" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
            <caixa tamanho="4" icon="fa fa-user-ninja" cor="bg-danger" valor="150" titulo="Ataques" fontcolor="text-white" textfooter="Mais Informações" link="#"></caixa>
    </painel>

    <painel titulo="PAINEL 2" tamanho="8" cor="bg-dark">
            <div class="row">
                <painel titulo="Sub-Painel" conteudo="Painel 3"  subtitulo="UM" cor="bg-warning" fontcolor="text-dark" tamanho="4"> </painel>
                <painel titulo="Sub-Painel" conteudo="Painel 4"  subtitulo="DOIS" cor="bg-success" fontcolor="text-danger" tamanho="4"> </painel>
                <painel titulo="Sub-Painel" conteudo="Painel 5" subtitulo="TRES" cor="bg-info" fontcolor="text-dark" tamanho="4"></painel>
                <painel titulo="Sub-Painel" conteudo="Painel 6" subtitulo="QUATRO" cor="bg-danger" fontcolor="text-success" tamanho="4"> </painel>
            </div>
    </painel>
</pagina>

@endsection
