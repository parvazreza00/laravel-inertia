<template>
  <AppHead title="Contact"/>

    <app-layout>   
      <!--main body section start -->
      <div class="container mt-2">
          <div class="row">
              <h1>Contact </h1>

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
    <input type="email" class="form-control" :class="{'border border-danger':form.errors.email}" id="email" v-model="form.email" aria-describedby="emailHelp">
    <div class="text-danger" v-if="errors.email">{{ errors.email }}</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" :class="{'border border-danger':form.errors.phone}" id="phone" v-model="form.phone" aria-describedby="emailHelp">
    <div class="text-danger" v-if="errors.phone">{{ errors.phone }}</div>
  </div>
  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <textarea name="message" :class="{'border border-danger':form.errors.message}" id="message" v-model="form.message" class="form-control" cols="30" rows="5"></textarea>
    <div class="text-danger" v-if="errors.message">{{ errors.message }}</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" @change="previewImage" ref="image" :class="{'border border-danger':form.errors.image}" id="image" class="form-control" aria-describedby="emailHelp">
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

<script setup>
import { ref } from 'vue'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: null,
  email: null,
  phone: null,
  message: null,
  image: null,
  url: null,
})


const submit = () => {
  const imageInput = document.getElementById('image')
  if (imageInput) {
    form.image = imageInput.files[0]
  }
  form.post('/contact/store')
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

import AppLayout from '../Layouts/App.vue';
import AppHead from '../Layouts/AppHead.vue';
export default {
  components: {
    AppLayout,
    AppHead,
  },
};
</script>