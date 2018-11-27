<template>
  <!-- Button trigger modal -->
  <button
    type="button"
    class="btn btn-primary"
    data-toggle="modal"
    v-bind:data-target="setNome"
  >{{ label }}</button>
</template>

<script>
export default {

    props:['nomemodal','label'],
     computed: {
        setNome: function(){
            return "#"+this.nomemodal
        }
    }
    
}
</script>
