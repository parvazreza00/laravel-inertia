<template>
   <!-- <Head>
    <title>My app</title>
    <meta head-key="description" name="description" content="This is the default description" />
   </Head>   -->

   <nav class="navbar navbar-expand-lg bg-light">
   <div class="container-fluid">
     <a class="navbar-brand" href="#">Logo</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <Link class="nav-link active" aria-current="page" href="/">Home</Link>
         </li>
         <li class="nav-item">          
           <Link href="/about" class="nav-link">About</Link>
         </li>
         <li class="nav-item">
          <Link href="/contact" class="nav-link">Contact</Link>
         </li>
         
         
       </ul>
      
     </div>
   </div>
    </nav>

   <div>
    <slot></slot>
   </div>
 
 </template>
   
   <script setup>
   import { Link } from '@inertiajs/vue3'
   import { Head } from '@inertiajs/vue3'
   
   </script>