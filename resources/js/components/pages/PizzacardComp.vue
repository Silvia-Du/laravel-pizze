<template>
    <div>
        <div class="card" style="width: 23rem;">
            <div class="card-body">
                <h5 class="card-title">{{ pizza.name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted" v-if="pizza.is_Vegetarian">Pizza vegetariana</h6>
                <span>{{ pizza.price }} &euro;</span>
                <router-link :to="{ name: 'dettagli-pizza', params: {slug: pizza.slug} }" >Vedi i dettagli</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PizzacardComp',
    props:{
        pizza: Object
    },
    data () {


        return {}
    }
}
</script>

<style lang="scss" scoped>

</style>
