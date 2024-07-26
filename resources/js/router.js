import { createRouter, createWebHistory } from "vue-router";
import Basic from "./Pages/Basic.vue";
import App from "./Pages/App.vue";
import Address from "./Pages/Address.vue";
import Family from "./Pages/Family.vue";
import Education from "./Pages/Education.vue";
import Work from "./Pages/Work.vue";
import Achievement from "./Pages/Achievement.vue";
import Login from "./Pages/Login.vue";
import Prent from "./Pages/Prent.vue";


export const routes = [
    {
        path: '/', 
        component: App,
        name: 'Home nga Composition'
    },
    {
        path: '/basic', 
        component: Basic,
        name: 'beysik'
    },
    {
        path: '/address', 
        component: Address,
        name: 'adres'
    },
    {
        path: '/family', 
        component: Family,
        name: 'pamili'
    },
    {
        path: '/education', 
        component: Education,
        name: 'edumanzano'
    },
    {
        path: '/work', 
        component: Work,
        name: 'work'
    },
    {
        path: '/achievement', 
        component: Achievement,
        name: 'sheeeesh'
    },
    {
        path: '/login', 
        component: Login,
        name: 'eyyyyy'
    },
    {
        path: '/prent', 
        component:Prent,
        name: 'wiw'
    },
]
