<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    errors: Object,
    student: Object,
})

const form = useForm({
    name:props.student.name,
    email:props.student.email,
    age:props.student.age,
    gender:props.student.gender,
    dob:props.student.dob,
    address:props.student.address,
    image: null,
});
const previewImage = (e) => {
    const file = e.target.files[0]
    form.image = file
    form.url = URL.createObjectURL(file)
  }

function submit(id){
    router.post('/student/update/'+id,form)
}

</script>

<template>
     <AppHead title="Sudent Edit"/>
    <app-layout>  
    <div class="container">
        <div class="card">
  <div class="card-header">
    Contact Update
  </div>
  <div class="card-body">
        <form @submit.prevent="submit(student.id)">
    <div class="mb-3">
       <label for="name">Name</label>
       <input type="text" class="form-control" id="name" v-model="form.name">
       <div class="text-danger" v-if="errors.name">{{ errors.name }}</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Enter Email">
        <div class="text-danger" v-if="errors.email">{{ errors.email }}</div>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" id="age" v-model="form.age" placeholder="Enter age">
        <div class="text-danger" v-if="errors.age">{{ errors.age }}</div>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" id="gender" v-model="form.gender" placeholder="Enter gender">
        <div class="text-danger" v-if="errors.gender">{{ errors.gender }}</div>
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date Of Birth</label>
        <input type="date" class="form-control" id="dob" v-model="form.dob" placeholder="Enter dob">
        <div class="text-danger" v-if="errors.dob">{{ errors.dob }}</div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" v-model="form.address" placeholder="Enter address">
        <div class="text-danger" v-if="errors.address">{{ errors.address }}</div>
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Image</label>
      <input type="file" @change="previewImage" ref="image" :class="{'border border-danger':form.errors.name}" id="image" class="form-control" aria-describedby="emailHelp">
      <div class="text-danger" v-if="errors.image">{{ errors.image }}</div>
     <!-- <img :src="contact.image" alt=""> -->
    </div>
    
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Submit</button>
        <Link href="/students" method="get" as="button" class="btn btn-primary">Back</Link>
    </div>
    </form>
  </div>
</div>
    </div>
</app-layout>
</template>

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