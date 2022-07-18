<template>
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'homepage'}">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'menu'}">Pizze</router-link>
                        </li>
                        <img  class="logo" src="../../../../public/img/logo.png" alt="logo">
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
    background-color: #192227a2;
    .logo{
        width: 110px;
    }
    .nav-item a{
        color: white;
        font-weight: bold;
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
            bottom: -15px;
            left: 50%;
            transform: translate(-50%);
            height: 3px;
            width: 80%;
        }
    }
}
</style>
