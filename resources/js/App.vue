<template>
    <div>
        <HeaderComp />

            <router-view></router-view>

        <FooterComp />
    </div>
</template>

<script>
import HeaderComp from './components/partials/HeaderComp.vue'
import FooterComp from './components/partials/FooterComp.vue';
export default {
    data() {
        return {};
    },
    components: { HeaderComp, FooterComp }
}
</script>

<style lang="scss" scoped>
.container{
    min-height: calc(100vh - 110px);
}
</style>
