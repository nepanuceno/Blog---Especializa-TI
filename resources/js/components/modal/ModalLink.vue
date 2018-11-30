<template>
  <span>
    <span v-if="item">
      <!-- Button trigger modal -->
      <button
        v-on:click="preencheForm()"
        type="button"
        v-bind:class="setClass"
        data-toggle="modal"
        v-bind:data-target="setNome"
      >
        <i v-bind:class="setIconClass"></i>
        {{ label }}
      </button>
    </span>
    
    <span v-if="!item">
      <!-- Button trigger modal -->
      <button
        type="button"
        v-bind:class="setClass"
        data-toggle="modal"
        v-bind:data-target="setNome"
      >
        <i v-bind:class="setIconClass"></i>
        {{ label }}
      </button>
    </span>
  </span>
</template>

<script>
export default {
  props: ["nomemodal", "label", "cor", "iconclass", "item", "url"],
  computed: {
    setNome: function() {
      return "#" + this.nomemodal;
    },

    setClass: function() {
      return "btn " + (this.cor || "btn-primary");
    },
    setIconClass: function() {
      return this.iconclass || "fa fa-home";
    }
  },
  methods: {
    teste: function() {
      console.log("ITEM:", this.item);
    },
    preencheForm: function() {
      axios.get(this.url + this.item.id).then(res => {
        console.log(res.data);
        this.$store.commit("setItens", res.data);
      });
    }
  }
};
</script>
