@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
    <migalhas v-bind:itens="{{ $migalhas }}"></migalhas>
    <painel titulo="Lista de Artigos" tamanho="12" cor="bg-dark">

        <tabela-lista v-bind:titulos="['#','Titulo', 'Autor','Descrição', 'Data']" v-bind:itens="[
            ['1','Como Falir uma Starup com Estilo e Confiança 1','Paulo Roberto Torres 1', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018'],
            ['2','Como Falir uma Starup com Estilo e Confiança 2','Paulo Roberto Torres 2', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018'],
            ['3','Como Falir uma Starup com Estilo e Confiança 3','Paulo Roberto Torres 3', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018'],
            ['4','Como Falir uma Starup com Estilo e Confiança 4','Paulo Roberto Torres 4', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018'],
            ['5','Como Falir uma Starup com Estilo e Confiança 5','Paulo Roberto Torres 5', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018'],
            ]" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" ordemcol="0" ordem="asc" >
        </tabela-lista>

    </painel>
</pagina>
@endsection