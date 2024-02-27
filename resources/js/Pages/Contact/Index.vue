<script setup>
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

defineProps({
  students : Object
});

function destroy(id){
    router.delete('/student/'+id);
}
function edit(id){
    router.get('/student/'+id);   
}
function view(id){
    router.get('/student/'+id+'/view');    
}

</script>

<template>
  <AppHead title="Sudent Mng"/>

    <app-layout>   
      <!--main body section start -->
      <div class="mt-2">
          <div class="row">
             <div class="d-flex justify-content-between">
              <h1>All Students Information </h1>  
           
             
            
             </div>
           <div v-if="students.data.length">
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>ST.ID</th>
                      <th>Email</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>Address</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    <tr v-for="item in students.data" :key="item.id">
                      <td>{{ item.id   }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.student_id }}</td>
                      <td>{{ item.email  }}</td>
                      <td>{{ item.age  }}</td>
                      <td>{{ item.gender  }}</td>
                      <td>{{ item.dob  }}</td>
                      <td>{{ item.address  }}</td>
                      <td>
                        <img :src="item.image" height="60" width="60">
                      </td>
                      <td>  
                        <button @click.prevent="view(item.id)" class="btn btn-info me-2">view</button>                      
                        <button @click.prevent="edit(item.id)" class="btn btn-primary me-2">Edit</button>
                        <button @click.prevent="destroy(item.id)"   class="btn btn-danger">Delete</button>
                    </td>
                    </tr>
                  </tbody>

                </table>
               <Pagination :pagination="students.meta"></Pagination>
                
              </div>
            </div> 

           </div>           

             
          </div>
      </div>
    </app-layout>
   
</template>



<script>

import AppLayout from '../../Layouts/App.vue';
import AppHead from '../../Layouts/AppHead.vue';
import Pagination from '../../Layouts/Pagination.vue';
export default {
  components: {
    AppLayout,
    AppHead,
  },
};
</script>