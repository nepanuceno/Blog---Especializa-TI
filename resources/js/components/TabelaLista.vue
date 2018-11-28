<template>
  <div>
    <div class="form">
      <a v-if="criar && !modal" v-bind:href="criar" class="btn btn-success">
        <i class="fa fa-plus"></i> Criar
      </a>
      <modallink v-if="criar && modal" nomemodal="adicionar" label="Criar"></modallink>

      <div class="form-group float-right bg-dark col-md-3">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
      </div>
    </div>
    <table class="table table-hover table-striped bg-color='primary'">
      <thead>
        <tr>
          <th
            style="cursor:pointer"
            v-on:click="ordenaColuna(index)"
            v-for="(titulo, index) in titulos"
            :key="index"
            :titulo="titulo"
          >{{ titulo }}</th>

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
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a> |
              <modallink
                v-if="detalhe && modal"
                nomemodal="detalhe"
                label="Detalhe"
                cor="btn-success"
              ></modallink>
              <a v-if="editar && !modal" v-bind:href="editar">Editar</a> |
              <modallink v-if="editar && modal" nomemodal="editar" label="Editar" cor="btn-warning"></modallink>

              <a v-if="deletar && !modal" v-bind:href="deletar" v-on:click="sendForm(index)">Deletar</a>
              <modallink
                v-if="deletar && modal"
                nomemodal="deletar"
                label="Deletar"
                cor="btn-danger"
              ></modallink>
            </form>

            <span v-if="!token">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink
                v-if="detalhe && modal"
                nomemodal="detalhe"
                label="Detalhe"
                cor="btn-success"
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
              <modallink v-if="editar && modal" nomemodal="editar" label="Editar" cor="btn-warning"></modallink>

              <a v-if="deletar && !modal" v-bind:href="deletar">Deletar</a>
              <modallink
                v-if="deletar && modal"
                nomemodal="deletar"
                label="Deletar"
                cor="btn-danger"
              ></modallink>
            </span>
            
            <span v-if="token && !deletar">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink
                v-if="detalhe && modal"
                nomemodal="detalhe"
                label="Detalhe"
                cor="btn-success"
              ></modallink>
              <a v-if="editar && !modal" v-bind:href="editar">Editar</a> |
              <modallink v-if="editar && modal" nomemodal="editar" label="Editar" cor="btn-warning"></modallink>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  props: [
    "titulos",
    "itens",
    "criar",
    "deletar",
    "editar",
    "detalhe",
    "token",
    "ordem",
    "ordemcol",
    "modal"
  ],
  data: function() {
    return {
      buscar: "",
      ordemAux: this.ordem || "asc",
      ordemColAux: this.ordemcol || "0"
    };
  },
  methods: {
    sendForm: function(index) {
      document.getElementById(index).submit();
    },
    ordenaColuna: function(coluna) {
      this.ordemColAux = coluna;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    }
  },
  computed: {
    lista: function() {
      let ordem = this.ordemAux;
      let orderCol = this.ordemColAux;

      ordem = ordem.toLowerCase();
      orderCol = parseInt(orderCol);

      if (ordem == "asc") {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
            return 1;
          }
          if (Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
            return -1;
          }

          return 0;
        });
      } else {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
            return 1;
          }
          if (Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
            return -1;
          }

          return 0;
        });
      }

      if (this.buscar) {
        return this.itens.filter(res => {
          for (let k = 0; k < res.length; k++) {
            if (
              res[k]
                .toString()
                .toLowerCase()
                .indexOf(this.buscar.toString().toLowerCase()) >= 0
            ) {
              return true;
            }
          }
          return false;
        });
      }

      return this.itens;
    }
  }
};
</script>
