<template>
    <div>
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title">{{ pizza.name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted" v-if="pizza.is_Vegetarian">Pizza vegetariana</h6>
                <span>{{ pizza.price }} &euro;</span>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'ShowComp',
    props:{

    },
    data () {
         return {
            apiUrl: '/api/pizze/show/',
            pizza: {
                name:'',
                price:''
            }


         }
    },
    methods:{
        getPizza(){
            let url = this.apiUrl + this.$route.params.slug
            console.log(url);
            axios.get(this.apiUrl + this.$route.params.slug)
            .then(r => {
                this.pizza = r.data
            })
        }

    },
    mounted(){
        this.getPizza();
    }
}
</script>

<style lang="scss" scoped>

</style>
