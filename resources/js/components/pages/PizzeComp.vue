<template>
    <div class="pizza-container">
       <PizzacardComp
        v-for="pizza in pizze"
        :key="`pizza${pizza.id}`"
        :pizza="pizza"/>
    </div>
</template>

<script>
import PizzacardComp from './PizzacardComp.vue';
export default {
    name: 'PizzeComp',
    components: {
        PizzacardComp
    },
    data () {
         return {
            apiUrl:'api/pizze',
            pizze: null
         }
    },
    methods:{
        getPizze(){
            axios.get(this.apiUrl)
            .then(res =>{
                console.log(res);
                this.pizze = res.data.pizze;
            })
        }
    },
    mounted(){
        this.getPizze();
    }
}
</script>

<style lang="scss" scoped>
.pizza-container{
    display: flex;
    flex-wrap: wrap;
    gap: 2px;
    justify-content:flex-start;
    flex-shrink: 0;
}
</style>
