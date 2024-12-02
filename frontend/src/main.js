import { createApp,markRaw } from 'vue'
import './style.css'
import App from './App.vue'
import store from './store'
import router from './router';
import { createPinia } from 'pinia';
// import VueAxios from 'vue-axios';
// import axios from 'axios';
const pinia = createPinia();
pinia.use(({store}) => {
    store.router = markRaw(router);
})
createApp(App).use(pinia).use(store).use(router).mount('#app');
