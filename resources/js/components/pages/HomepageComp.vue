<template>
    <div class="container-fluid jumbo d-flex justify-content-center align-items-center text-center" >
        <div class="cta">
            <h5 class="subtitle">Pizza of the day</h5>
            <h1 class="title">Spicy Siciliana</h1>
            <router-link :to="{ name: 'pizze' }" >Our Menu</router-link>
        </div>

    </div>
</template>

<script>
import HeaderComp from '../partials/HeaderComp.vue';

export default {
    name: 'HomepageComp',
    data() {
        return {};
    },
    components: { HeaderComp }
}
</script>

<style lang="scss" scoped>

.jumbo{
    background-image: url('../../../../public/img/bg_home.png');
    height: calc(100vh - 55px);
    color: white;
    text-transform: uppercase;

    .title{
        font-size: 6rem;
        font-weight: bold;
        margin-bottom: 80px;
    }
    .subtitle{
        font-size: 1.5rem;
    }

    a{
        text-transform: uppercase;
        background-color: rgb(107, 179, 0);
        color: white;
        font-weight: bold;
        padding: 15px 20px;
        transition: all 0.3s;
        &:hover{
            text-decoration: none;
            background-color: transparent;
            border: 1px solid rgb(107, 179, 0);
        }
    }


}

</style>
