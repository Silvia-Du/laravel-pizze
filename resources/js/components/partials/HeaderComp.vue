<template>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container ">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'homepage'}">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'menu'}">Pizze</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:''}">About</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:''}">Contacts</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'HeaderComp'
}
</script>

<style lang="scss" scoped>
nav.navbar {
    height: 60px;
    background-color: #192227;
    .nav-item a.nav-link{
        color: white;
        &:hover{
            text-decoration: underline;
        }
        &.active{
            color:#4ca7d8;
        }
    }
}
</style>
