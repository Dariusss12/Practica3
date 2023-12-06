import { App } from '@capacitor/app';
import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    component: App,
  },

]

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router