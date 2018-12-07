<template>
  <div :class="'col-md-' + (md || '4')">
    <div :class="'card mb-'+(mb || '4')+' box-shadow'">
      <img class="card-img-top" v-bind:src="img" data-holder-rendered="true">
      <div class="card-body">
          <h3>{{ titulo }}</h3>
        <p class="card-text">{{ conteudo }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button> -->
            <modallink
                nomemodal="detalhe"
                label="Detalhe"
                cor="btn-sm btn-outline-secondary"
                v-bind:item="item"
                v-bind:url="detalhe"
                iconclass="fa fa-eye"
              ></modallink>
               <modallink
                nomemodal="editar"
                label="Editar"
                cor="btn-sm btn-outline-secondary"
                v-bind:item="item"
                v-bind:url="editar"
                iconclass="fa fa-edit"
              ></modallink>
          </div>
          <small class="text-muted">{{ time }}</small>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item","titulo", "img", "conteudo", "time","md","mb","detalhe","editar"],
};
</script>
