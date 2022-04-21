import Vue from 'vue'
import VueRouter from "vue-router";

Vue.use(VueRouter)

//require('./bootstrap');

export default new VueRouter({
    mode:'history',

    routes: [
        {
            path: '/people', component: () => import('./components/Person/Index'),
            name: 'person.index'
        },
        {
            path: '/people/create', component: () => import('./components/Person/Create'),
            name: 'person.create'
        },
        // {
        //     path: '/people/show', component: () => import('./components/Person/Show'),
        //     name: 'person.show'
        // },
        // {
        //     path: '/people/edit', component: () => import('./components/Person/Edit'),
        //     name: 'person.edit'
        // },
    ]
})