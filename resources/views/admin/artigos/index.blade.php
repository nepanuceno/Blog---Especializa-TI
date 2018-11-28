@extends('layouts.app') 
@section('content')
<pagina tamanho="12">
    <migalhas v-bind:itens="{{ $migalhas }}"></migalhas>

    <painel titulo="Lista de Artigos" tamanho="12" cor="bg-dark">
        <tabela-lista v-bind:titulos="['#','Titulo', 'Autor','Descrição', 'Data']" v-bind:itens="{{ $listaArtigos }}" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" ordemcol="0" ordem="asc" modal="sim" >
        </tabela-lista>
    </painel>

    <modal nome="adicionar" titulo="Adicionar Artigo">
       <painel titulo="Adicionar Artigo">
           <formulario css="" action="#" method="put" enctype="" token="ethsae5hgw4hbqw5hqa45hy=">
                <div class="form-group">
                   <label for="titulo">Título</label>
                   <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>

                <div class="form-group">
                   <label for="descricao">Descrição</label>
                   <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                </div>

                <button type="submit" class="btn btn-info" >Adicionar</button>

           </formulario>
       </painel>
    </modal>

    <modal nome="editar" titulo="Editar Artigo">
        <painel titulo="Editar Artigo">
            <formulario css="" action="#" method="put" enctype="" token="ethsae5hgw4hbqw5hqa45hy=">
                 <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                 </div>
 
                 <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                 </div>
 
                 <button type="submit" class="btn btn-info" >Adicionar</button>
 
            </formulario>
        </painel>
     </modal>

     <modal nome="detalhe" titulo="Detalhes do Artigo" footer="sim">
        <painel titulo="Detalhes do Artigo">
            Bla bla bla
        </painel>
     </modal>

     <modal nome="deletar" titulo="Deletar Artigo" footer="sim" cor="bg-danger" >
       <h3 class="text-white">Tem Certeza que deseja apagar permanentemente este Artigo?</h3>
     </modal>

</pagina>
@endsection