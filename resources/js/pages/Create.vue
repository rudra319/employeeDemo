<template>
<div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Employee Form</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <router-link :to="{name: 'employee.index'}" class="float-right btn btn-secondary">Back</router-link>
                </div>
            </div>
            <div class="card-body">
                <form @submit.prevent="storeEmployee" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="emp_id" class="col-md-4 col-form-label text-md-right">Employee Id</label>
                        <div class="col-md-6">
                            <input id="emp_id" type="text" class="form-control"
                            name="emp_id" v-model="employeeForm.emp_id" required >
                        </div>
                        <small class="text-danger" v-if="errors.emp_id">{{ errors.emp_id[0] }}</small>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control"
                            name="name" v-model="employeeForm.name" required >
                        </div>
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>
                   
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control"
                            name="address" v-model="employeeForm.address" >
                        </div>
                        <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control"
                            name="email" v-model="employeeForm.email" required >
                        </div>
                        <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                    </div>
                    
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control"
                            name="phone" v-model="employeeForm.phone" required>
                        </div>
                        <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                    </div>
                    <div class="form-group row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-right">Birthdate</label>
                        <div class="col-md-6">
                            <datepicker v-model="employeeForm.birthdate" input-class="form-control"></datepicker>
                        </div>
                        <small class="text-danger" v-if="errors.birthdate">{{ errors.birthdate[0] }}</small>
                    </div>
                    <div class="form-group row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-right">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="photo" class="form-control" v-on:change="onFileChange">
                        </div>
                        <br>
                        <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add New
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform'
import Datepicker from 'vuejs-datepicker'
import axios from 'axios'
import moment from "moment";
export default {
    components: {
        Datepicker
    },
    data(){
        return{
            employeeForm: {
                emp_id: '',
                name: '',
                address: '',
                email: '',
                phone: '',
                birthdate: '',
            },
            errors: '',
            myForm: ''
        }
    },
    mounted(){
    },
    methods: {
        onFileChange(e){
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
        },
        async storeEmployee(){
            this.employeeForm.birthdate = this.formateDate(this.employeeForm.birthdate);

            let config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = this.convertToForm();

            try {
                await axios.post('/api/employees', formData, config)
                await this.$router.push({name: 'employee.index'});
            } catch (e) {
                this.errors = e.response.data.errors
            }


        },
        formateDate(value){
            if(value){
                return moment(String(value)).format("YYYYMMDD");
            }
        },
        convertToForm(){
            let formData = new FormData();
            $.each(this.employeeForm, function(i, j){
                formData.append(i, j);
            });
            formData.append('photo', this.file);
            return formData;
        }
    }
}
</script>

<style>

</style>
