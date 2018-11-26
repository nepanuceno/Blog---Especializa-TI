<template>

    <div v-bind:class="defineClasse">
        <div class="inner">
            <h3>{{ valor }}</h3>

            <p>{{ titulo }}</p>
        </div>
        <div class="icon">
            <i v-bind:class="defineIcon"></i>
        </div>
        <a v-bind:href="link" v-bind:class="defineFooter">{{ textfooter }} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    
</template>

<script>
export default {
  props: ["valor", "titulo", "icon", "cor", "fontcolor", "textfooter", "link","tamanho"],
  computed: {
    defineClasse: function() {
      return "small-box " + ("col-md-"+ (this.tamanho || 'col-md-12')) +" "+ (this.cor || "bg-primary") +" "+ (this.fontcolor || '')+" m-2";
    },

    defineIcon: function() {
      return (this.icon || "");
    },

    defineFooter: function(){
        return "small-box-footer "+( this.fontcolor || '');
    }
  }
};
</script>

<style media="screen">

.bg-info {

    background-color: #17a2b8 !important;
}

.small-box {

    border-radius: .25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
    position: relative;
    display: block;
    margin-bottom: 20px;

}

.small-box > .inner {

    padding: 10px;

}

.small-box h3, .small-box p {

    z-index: 5;

}
.small-box h3 {

    font-size: 38px;
    font-weight: 700;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;

}
.h3, h3 {

    font-size: 1.75rem;

}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {

    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;

}
h1, h2, h3, h4, h5, h6 {

    margin-top: 0;
    margin-bottom: .5rem;

}

.small-box h3, .small-box p {

    z-index: 5;

}
.small-box p {

    font-size: 15px;

}
p {

    margin-top: 0;
    margin-bottom: 1rem;

}


.bg-info, .bg-info a, .label-info, .label-info a {

    color: #fff !important;

}

.small-box .icon {

    transition: all .3s linear;
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,.15);

}



.small-box > .small-box-footer {

    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,.1);
    text-decoration: none;

}

a {

    color: #007bff;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;

}
a:hover {

    color: #0056b3;
    text-decoration: none;

}

.small-box:hover {

    text-decoration: none;

}

.small-box:hover .icon {

    font-size: 95px;

}

.small-box > .small-box-footer:hover {

    color: #fff;
    background: rgba(0,0,0,.15);

}
 
</style>

