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
    .nav-item a{
        color: white;
        text-transform: uppercase;
        font-size: 0.9rem;
        margin: 20px;
        margin-bottom: 10px;
        position: relative;
        &:hover{
            text-decoration: none;
            color: red;
            &::after{
                background-color: red;
            }
        }
        &.active{
            color: red;
            &::after{
                background-color: red;
            }
        }
        &::after{
            content: ' ';
            display: table;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translate(-50%);
            height: 3px;
            width: 80%;
            // background-color: red;
        }
    }
}
</style>
