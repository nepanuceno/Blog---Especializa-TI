@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
    <migalhas v-bind:itens="{{ $migalhas }}"></migalhas>

    @if($errors->all())
    <div class="alert alert-danger alert-dismissible alert-dismissible fade show text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> @foreach ($errors->all() as $item)

        <p>{{ $item }}</p>

        @endforeach
    </div>
    @endif

    <painel titulo="Lista de Artigos" tamanho="12" cor="bg-dark">
        <tabela-lista v-bind:titulos="['#','Titulo', 'Autor','Descrição', 'Data']" v-bind:itens="{{ $listaArtigos }}" criar="#criar"
            detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" ordemcol="0" ordem="asc" modal="sim" token="{{ csrf_token() }}">
        </tabela-lista>
    </painel>

    <modal nome="adicionar" titulo="Adicionar Artigo" footer="sim" cordafonte="text-white">

        <formulario id="formAdicionar" css="" action="{{ route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{ old('titulo') }}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo" cols="30" rows="3">{{ old('conteudo') }}</textarea>

            </div>
            <div class="form-group">
                <label for="data">Criação</label>
                <input type="date" class="form-control" id="data" name="data" value="{{ old('descricao') }}">
            </div>

        </formulario>

        <span slot="botoes">
            <button class="btn btn-primary" type="submit" form="formAdicionar">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar Artigo" footer="sim" cordafonte="text-white">

        <formulario id="formSalvar" css="" v-bind:action="'/admin/artigos/'+$store.state.itens.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.itens.titulo" placeholder="Título">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.itens.descricao" placeholder="Descrição">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo" cols="30" rows="3" v-model="$store.state.itens.conteudo"></textarea>

            </div>
            <div class="form-group">
                <label for="data">Criação</label>
                <input type="date" class="form-control" id="data" name="data" v-model="$store.state.itens.data">
            </div>

        </formulario>

        <span slot="botoes">
                <button class="btn btn-info" type="submit" form="formSalvar">Confirmar</button>
        </span>

    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.itens.titulo" footer="sim"  cordafonte="text-white">
        <h4>Descrição</h4>
        <span>
            @{{ $store.state.itens.descricao}}
        </span>
    </modal>

    <modal nome="deletar" titulo="Deletar Artigo" footer="sim" cor="bg-danger"  cordafonte="text-white">
        <h3 class="text-white">
            Tem Certeza que deseja apagar permanentemente este Artigo?</h3>
        <span slot="botoes">
           <button class="btn btn-outline-danger" v-bind:form="$store.state.itens.id" type="submit">Confirmar</button>
       </span>
    </modal>

</pagina>
@endsection