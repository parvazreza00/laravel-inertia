<template>
    <nav class="d-flex justify-content-center">


        <template v-for="link in pagination.links" :key="link.label" >

            <Link :href="link.url ?? ''" 
            preserve-scroll=""
            v-html="link.label"
            class="d-flex justify-items-center justify-content-center text-sm px-3 py-2 rounded"
            :class="{'bg-secondary' : link.active,'!text-gray': !link.url}"
            />

        </template>
      
       
 
    </nav>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    pagination:Object
})

</script>