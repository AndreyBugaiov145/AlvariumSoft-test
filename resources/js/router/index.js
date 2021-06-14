import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const routes = [
    {
        name: 'home',
        path: '/',

        component: () => import('../view/Home')
    },
    {
        name: 'department',
        path: '/department/:id(\\d+)',
        component: () => import('../view/Department')
    },
    {
        name: 'abort',
        path: '/*',
        component: () => import('../view/Abort')
    },

]

const router = new Router({
    mode: 'history',
    routes
})

export default router
