@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Lista de Artigos" tamanho="12" cor="bg-dark">
        
            <tabela-lista 
                v-bind:titulos="['#','Titulo', 'Autor','Descrição', 'Data']"
                v-bind:itens="[
                        ['1','Como Falir uma Starup com Estilo e Confiança','Paulo Roberto Torres', 'Nesse trabalho, ensino como foder o ciclo de vida de uma boa idea(só na sua cabeça arrogante)', '25/11/2018']
                    ]"
                criar="#criar"
                detalhe="#detalhe"
                editar="#editar"
                deletar="#deletar"
                token="03498764369"
                >
            </tabela-lista>

    </painel>
</pagina>

@endsection
