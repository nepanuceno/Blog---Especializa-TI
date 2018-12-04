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

    <painel titulo="Lista de Autores" tamanho="12" cor="bg-dark">
            
        <tabela-lista 
                    v-bind:titulos="['#','Nome', 'E-mail']" 
                    v-bind:itens="{{ json_encode($listaAutores) }}" 
                    criar="#criar"
                    detalhe="/admin/autores/"
                    editar="/admin/autores/" 
                    ordemcol="0" 
                    ordem="asc" 
                    modal="sim"
                    token="{{ csrf_token() }}">
        </tabela-lista>
        {{ $listaAutores->links() }}
    </painel>

    <modal nome="adicionar" titulo="Adicionar Autores" footer="sim" cordafonte="text-white">

        <formulario id="formAdicionar" css="" action="{{ route('autores.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                    <label for="autor">Autor?</label>
                    <select  class="form-control" name="autor" id="autor">
                        <option {{ (old('autor')) == 'S' ? 'selected':'' }} value="S">Sim</option>
                        <option {{ (old('autor')) == 'N' ? 'selected':'' }} value="N">Não</option>
                    </select>
            </div>
           
           
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            </div>

        </formulario>

        <span slot="botoes">
            <button class="btn btn-primary" type="submit" form="formAdicionar">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar Autor" footer="sim" cordafonte="text-white">

        <formulario id="formSalvar" css="" v-bind:action="'/admin/autores/'+$store.state.itens.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Título</label>
                <input type="text" class="form-control" id="name" name="name" v-model="$store.state.itens.name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" v-model="$store.state.itens.email" placeholder="E-mail">
            </div>

            
            <div class="form-group">
                    <label for="autor">Autor?</label>
                    <select  class="form-control" name="autor" id="autor" v-model="$store.state.itens.autor">
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" v-model="$store.state.itens.password">
            </div>

        </formulario>

        <span slot="botoes">
                <button class="btn btn-info" type="submit" form="formSalvar">Confirmar</button>
        </span>

    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.itens.name" footer="sim" cordafonte="text-white">
        <h4>Descrição</h4>
        <span>
            @{{ $store.state.itens.email}}
        </span>
    </modal>

    <modal nome="deletar" titulo="Deletar Autor" footer="sim" cor="bg-danger" cordafonte="text-white">
        <h3 class="text-white">
            Tem Certeza que deseja apagar permanentemente este Autor?</h3>
        <span slot="botoes">
           <button class="btn btn-outline-danger" v-bind:form="$store.state.itens.id" type="submit">Confirmar</button>
       </span>
    </modal>

</pagina>
@endsection