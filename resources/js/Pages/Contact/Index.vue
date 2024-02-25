<script setup>

defineProps({
  contacts : Object
});


</script>

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