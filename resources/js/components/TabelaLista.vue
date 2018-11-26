<template>

    <div>
        <a v-if="criar" v-bind:href="criar">Criar</a>

        <table class="table table-hover table-striped bg-color='primary'">

            <thead>
                <tr>
                    <th v-for="(titulo, index) in titulos" :key="index" :titulo="titulo">{{ titulo }}</th>
                   
                    <th v-if="detalhe || editar || deletar">Ações</th>
                </tr>
            </thead>

            <tbody>

                <tr  v-for="(item, index) in itens" :key="index">
                    <td v-for="i in item" :key="i">{{ i }}</td>
                   
                    <td v-if="detalhe || editar || deletar">
                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> | 
                        <a v-if="editar" v-bind:href="editar">Editar</a> | 
                        <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>
    
</template>


<script>
export default {

    props: ['titulos','itens', 'criar','deletar','editar','detalhe','token']
    
}
</script>
