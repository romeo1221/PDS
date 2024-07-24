import "./bootstrap";
import { createApp } from "vue";
import App from "./Pages/App.vue";
import { createRouter, createWebHistory, useRoute } from 'vue-router'
import { routes } from './router.js';

const router = createRouter({
    history: createWebHistory(),
    routes : routes
})

createApp(App).use(router).mount("#app");


