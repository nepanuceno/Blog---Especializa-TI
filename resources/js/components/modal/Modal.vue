<template>
  <div
    class="modal fade"
    v-bind:id="setNome"
    tabindex="-1"
    role="dialog"
    v-bind:aria-labelledby="setNome"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLongTitle">{{ titulo }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div v-bind:class="setClass"><slot></slot></div>
        <div v-if="footer == 'sim'" class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">OK</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

    props: ['nome','titulo','footer', 'cor'],
    computed: {
        setNome: function(){
            return this.nome
        },

        setClass: function(){
          return "modal-body "+this.cor+ " "+this.corfonte;
        }
    }
    
}
</script>
