import Vue from "vue";
import VueRouter from "vue-router";

import EmployeeIndex from '../pages/Index.vue'
import EmployeeCreate from '../pages/Create.vue'
import EmployeeEdit from '../pages/Edit.vue'

Vue.use(VueRouter);


const routes = [
    { path: '', component: EmployeeIndex, name: 'employee.index' },
    { path: '/employee/create', component: EmployeeCreate, name: 'employee.create' },
    { path: '/employee/edit/:id', component: EmployeeEdit, name: 'employee.edit' },
];


const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
