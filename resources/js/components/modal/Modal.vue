<template>
  <div
    class="modal fade"
    v-bind:id="setNome"
    tabindex="-1"
    role="dialog"
    v-bind:aria-labelledby="setNome"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div v-bind:class="setFontColor" v-bind:style="setStyle">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ titulo }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div v-bind:class="setClass">
          <slot></slot>
        </div>
        <div v-if="footer == 'sim'" class="modal-footer">
          <span class="float-left">
            <button
              type="button"
              class="btn btn-outline-secondary float-left"
              data-dismiss="modal"
            >Fechar</button>
          </span>
          <slot name="botoes"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["nome", "titulo", "footer", "cor", "cordafonte","estilo"],
  computed: {
    setNome: function() {
      return this.nome;
    },

    setClass: function() {
      return "modal-body " + this.cor + " " + this.cordafonte;
    },

    setFontColor: function() {
      return "modal-content " + this.cordafonte;
    },

    setStyle: function() {
      return this.estilo;
    }
  }
};
</script>
