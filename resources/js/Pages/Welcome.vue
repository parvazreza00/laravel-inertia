<template>
  
    <AppHead title="Welcome" />
    
    <app-layout>   
    <!--main body section start -->
    <div class="container mt-2">
        <div class="row">
            <h1 class="py-2">Welcome to Student mangement system</h1>
            <div class="col-md-10" style="width: 100%;height: 400px;border: 2px dashed gray;">
             <marquee behavior="" direction=""><h1 style="margin-top: 100px;margin-left: 300px;color: green;font-size: 40px;"> Welcome to Student Management System</h1></marquee>
            </div>
        </div>
    </div>
    </app-layout>
   
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
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