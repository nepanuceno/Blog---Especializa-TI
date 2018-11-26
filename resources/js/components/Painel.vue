<template>

    <div v-bind:class="defineClasse">
        <div class="card-header">{{titulo}}</div>
        <div class="card-body">
            <h5 class="card-title">{{ subtitulo }}</h5>
            <p class="card-text">{{conteudo}}</p>
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['titulo', 'subtitulo', 'conteudo', 'cor', 'tamanho', 'fontcolor'],
        computed:{
            defineClasse: function(){
                return "card "+ (this.fontcolor || 'text-white') +" "+ (this.cor || 'bg-primary') +" "+ ('col-md-'+this.tamanho || 'col-md-12' ) +" m-2";
            }
        }
    }
</script>

<style media="screen">

</style>
