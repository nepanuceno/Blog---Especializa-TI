<template>
  <div>
    <div class="form">
      <a v-if="criar" v-bind:href="criar" class="btn btn-success">
        <i class="fa fa-plus"></i> Criar
      </a>
      <div class="form-group float-right bg-dark col-md-3">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
      </div>
    </div>
    <table class="table table-hover table-striped bg-color='primary'">
      <thead>
        <tr>
          <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos" :key="index" :titulo="titulo">{{ titulo }}</th>

          <th v-if="detalhe || editar || deletar">Ações</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(item, index) in lista" :key="index">
          <td v-for="i in item" :key="i">{{ i }}</td>

          <td v-if="detalhe || editar || deletar">
            <form v-bind:id="index" v-if="deletar && token" action="deletar" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="token">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a> |
              <a v-if="deletar" v-bind:href="deletar" v-on:click="sendForm(index)">Deletar</a>
            </form>

            <span v-if="!token">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a> |
              <a v-if="deletar" v-bind:href="deletar">Deletar</a>
            </span>
            
            <span v-if="token && !deletar">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a> |
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {

    props: ['titulos','itens', 'criar','deletar','editar','detalhe','token', 'ordem', 'ordemcol'],
    data:function(){
        return {
            buscar:'',
            ordemAux: this.ordem || "asc",
            ordemColAux: this.ordemcol || "0"
        }
    },
    methods:{
        sendForm: function(index){
            document.getElementById(index).submit();
        },
        ordenaColuna: function(coluna){

            this.ordemColAux = coluna;
            if(this.ordemAux.toLowerCase() == "asc"){
                this.ordemAux = "desc";
            } else {
                this.ordemAux = "asc";
            }
        }
    },
    computed :{
        lista: function(){

            let ordem = this.ordemAux;
            let orderCol = this.ordemColAux;

            ordem = ordem.toLowerCase();
            orderCol = parseInt(orderCol);

            if (ordem == "asc") {

                this.itens.sort(function(a,b){
                    if(a[orderCol] > b[orderCol]) {return 1}
                    if(a[orderCol] < b[orderCol]) {return -1}
    
                    return 0;
                });
            } else {
                
                this.itens.sort(function(a,b){
                    if(a[orderCol] < b[orderCol]) {return 1}
                    if(a[orderCol] > b[orderCol]) {return -1}
    
                    return 0;
                });
            }

          
            return this.itens.filter( res => {

                for (let k=0; k<res.length; k++) {
                    if (res[k].toString().toLowerCase().indexOf(this.buscar.toString().toLowerCase()) >= 0) {
                        return true;
                    } 
                }
                return false;
            });

            return this.itens;
        }
    }

    
}
</script>
