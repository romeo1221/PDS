// resources/js/app.js
import './bootstrap'; // Import for any necessary configurations
import { createApp } from 'vue'; // Import createApp for Vue instance
import App from './Pages/App.vue'; // Main Vue component
import { createRouter, createWebHistory } from 'vue-router'; // Vue Router imports
import { routes } from './router.js'; // Routes configuration

// Create the Vue Router instance
const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

// Create the Vue application instance
const app = createApp(App);

// Register global components (if needed)
import LoginComponent from './Pages/Login.vue';
app.component('login-component', LoginComponent);

// Use the router in the Vue application
app.use(router);

// Mount the Vue application
app.mount('#app');