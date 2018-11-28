<template>
  <!-- Button trigger modal -->
  <button
    type="button"
    v-bind:class="setClass"
    data-toggle="modal"
    v-bind:data-target="setNome"
  > <i class="fa fa-plus"></i> {{ label }}</button>
</template>

<script>
export default {

    props:['nomemodal','label', 'cor'],
     computed: {
        setNome: function(){
            return "#"+this.nomemodal;
        },

        setClass: function(){
            return "btn "+(this.cor || "btn-primary");
        }
    }
    
}
</script>
