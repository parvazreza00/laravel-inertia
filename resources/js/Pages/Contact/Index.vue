<template>
  <AppHead title="Contact"/>

    <app-layout>   
      <!--main body section start -->
      <div class="container mt-2">
          <div class="row">
              <h1>Contact </h1>

              

             
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

import AppLayout from '../../Layouts/App.vue';
import AppHead from '../../Layouts/AppHead.vue';
export default {
  components: {
    AppLayout,
    AppHead,
  },
};
</script>