<template>
<div class="row justify-content-center">
    <div class="col-md-9 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search" v-model="searchWord">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <router-link :to="{name: 'employee.create'}" class="float-right btn btn-primary">Create</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>

                    <tr v-for="(employee) in searchFilter" :key="employee.id">
                        <th scope="row">{{ employee.emp_id }}</th>
                        <th scope="row"> {{ employee.name }} </th>
                        <th scope="row"> {{ employee.address }} </th>
                        <th scope="row"> {{ employee.email }} </th>
                        <th scope="row"> {{ employee.phone }} </th>
                        <th scope="row"> <img v-if="employee.photo" width="50" height="50" v-bind:src="'/upload/'+employee.photo" alt=""> </th>
                        <td scope="row">
                            <router-link :to="{name: 'employee.edit', params: { id: employee.id }}" class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                            <button type="button" @click="deleteEmployee(employee.id)" class="btn btn-danger"> <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                      </tr>
                </tbody>
              </table>
            </div>
             <pagination align="center" :data="rawdata" @pagination-change-page="list">
                    <span slot="prev-nav">&lt; Previous</span>
	                <span slot="next-nav">Next &gt;</span>
             </pagination>
    </div>
</div>
</template>

<script>
import pagination from 'laravel-vue-pagination';
import axios from 'axios';
export default {
    components: {
        pagination
    },
    data(){
        return{
            rawdata: {},
            employees: [],
            searchWord: ''
        }
    },
    computed: {
        searchFilter(){
        return this.employees.filter(employee => {
            return (employee.name.match(this.searchWord) || employee.email.match(this.searchWord) || employee.phone.match(this.searchWord))
        });
        }
    },
    mounted(){
        this.list();
    },
    methods: {
        async list(page=1){
            let res = await axios.get(`/api/employees?page=${page}`)
            this.rawdata = res.data
            console.log(res.data.data);
            this.employees = res.data.data
        },
        async getEmployees(){
            let res = await axios.get(`/api/employees`)
            this.employees = res.data.data;
        },
        async deleteEmployee(id){
            await axios.delete(`/api/employees/${id}`)
            this.getEmployees();
        }
    }
}
</script>

<style>

</style>
