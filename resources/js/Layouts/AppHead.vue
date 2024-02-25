<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({ 
    title: String 
    })
</script>

<template>
  <Head :title="title ? `${title} - My Inertia App` : 'My Inertia App'">
    <slot />
  </Head>
</template>