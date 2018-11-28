<template>
  <form
    v-bind:class="setClass"
    v-bind:action="action"
    v-bind:method="defineMethod"
    v-bind:enctype="enctype"
  >
    <input v-if="token" type="hidden" name="_token" v-bind:value="token">
    <input v-if="alteraMethod" type="hidden" name="_method" v-bind:value="alteraMethod">
    <slot></slot>
  </form>
</template>

<script>
export default {
  props: ["css", "method", "action", "enctype", "token"],

  data: function() {
    return {
      alteraMethod: ""
    };
  },

  computed: {
    defineMethod: function() {
      if (
        this.method.toLowerCase() == "post" ||
        this.method.toLowerCase() == "get"
      ) {
        return this.method.toLowerCase();
      }

      if (this.method.toLowerCase() == "put") {
        this.alteraMethod = "put";
      }

      if (this.method.toLowerCase() == "delete") {
        this.alteraMethod = "delete";
      }
      return "post";
    },
    setClass: function() {}
  }
};
</script>
