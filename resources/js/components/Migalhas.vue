<template>

<nav aria-label="breadcrumb" class="float-right">
  <ol class="breadcrumb">
   
    <li v-for="(item, index) in itens" :key="index" v-bind:class="defineClass">
      <a v-if="item.url" v-bind:href="item.url ">{{ item.titulo }}</a>
      <span  v-if="!item.url"> {{ item.titulo }} </span>
    </li>


    <!-- <li v-if="!item.url" v-for="(item, index) in itens" :key="index" class="breadcrumb-item active" aria-current="page">
      <a>{{ item.titulo }}</a>
    </li> -->

  </ol>
</nav>
    
</template>

<script>
export default {
    props:['itens'],
    computed:{

      defineClass: function(){
        if (this.url) {
            return "breadcrumb-item active"
        } else {
          return "breadcrumb-item";
        }
      }
     
    }
    
}
</script>
