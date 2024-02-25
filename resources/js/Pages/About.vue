<template>
 <AppHead title="About"/>

    <app-layout>
   
 <!--main body section start -->
 <div class="container mt-2">
     <div class="row">
         <h1>About</h1>
         <div class="col-md-10" style="width: 100%;height: 400px;border: 2px dashed gray;">
 
         </div>
     </div>
 </div>
    </app-layout>
   
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'
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