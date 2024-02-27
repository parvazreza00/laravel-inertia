<script setup>
  import { ref } from 'vue'
  import { reactive } from 'vue'
  import { router } from '@inertiajs/vue3'
  import { useForm } from '@inertiajs/vue3'
  
  const form = useForm({
    name: null,
    email: null,
    age: null,
    gender: null,
    dob:null,
    address:null,
    image: null,
    url: null,
  }) 
  
  const submit = () => {
    const imageInput = document.getElementById('image')
    if (imageInput) {
      form.image = imageInput.files[0]
    }
    form.post('/student/store')
  }
  
  const previewImage = (e) => {
    const file = e.target.files[0]
    form.image = file
    form.url = URL.createObjectURL(file)
  }
  
  defineProps({
    errors: Object
  })
  </script>
  
  <script>
  
  import AppLayout from '../../Layouts/App.vue';
  import AppHead from '../../Layouts/AppHead.vue';
  export default {
    components: {
      AppLayout,
      AppHead,
    },
  };
  </script>

<template>
    <AppHead title="Create Student"/>
  
      <app-layout>   
        <!--main body section start -->
        <div class="container mt-2">
            <div class="row">
                <h1>Create Student </h1>
  
                <div class="card">
    <div class="card-body">
      <div class="row">
                    <div class="col-md-12">
                      <form @submit.prevent="submit">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control" :class="{'border border-danger':form.errors.name}" id="name" v-model="form.name" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.name">{{ errors.name }}</div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email </label>
      <input type="text" class="form-control" :class="{'border border-danger':form.errors.email}" id="email" v-model="form.email" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.email">{{ errors.email }}</div>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Age</label>
      <input type="number" class="form-control" :class="{'border border-danger':form.errors.age}" id="age" v-model="form.age" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.age">{{ errors.age }}</div>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <input type="text" class="form-control" :class="{'border border-danger':form.errors.gender}" id="gender" v-model="form.gender" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.gender">{{ errors.gender }}</div>
    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" class="form-control" :class="{'border border-danger':form.errors.dob}" id="phone" v-model="form.dob" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.dob">{{ errors.dob }}</div>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" :class="{'border border-danger':form.errors.address}" id="address" v-model="form.address" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.address">{{ errors.address }}</div>
    </div>
  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Student Image</label>
      <input type="file" @change="previewImage" ref="image" :class="{'border border-danger':form.errors.name}" id="image" class="form-control" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.image">{{ errors.image }}</div>
      <img :src="url" v-if="url" alt="Preview" style="width:100%;height: 500px;">
    </div>
    
   
    <button type="submit" class="btn btn-primary active">Submit</button>
  </form>
                    </div>
                  </div>
    </div>
  </div>
  
               
            </div>
        </div>
      </app-layout>
     
  </template>
  
  