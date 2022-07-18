//Si importa vue
import Vue from "vue";
//importo il router
import VueRouter from "vue-router";
// dico a vue di usare vuerouter
Vue.use(VueRouter);
//importo i componenti delle rotte dopo averli creati
import HomepageComp from './components/pages/HomepageComp';
import PizzeComp from './components/pages/PizzeComp.vue';
import ShowComp from './components/pages/ShowComp.vue';
// import NomeComp from './components/pages/NomeDueComp;
// creo il router e uso le rotte
const router = new VueRouter({
	mode: 'history',
	routes : [
		{
            path: '/',
            name: 'homepage',
            component: HomepageComp
		},
        {
            path: '/pizze',
            name: 'menu',
            component: PizzeComp
        },
        {
            path: '/show/:slug',
            name: 'dettagli-pizza',
            component: ShowComp
        },

	]
});
// lo esporto per poterlo importare dentro front.js che inizializza vue
export default router
