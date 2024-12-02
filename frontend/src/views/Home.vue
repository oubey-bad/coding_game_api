<template>
  <p>{{data.user}}</p>
</template>
<script setup>
import { useAuthStore } from '../../stores/auth';

const {data} = storeToRefs( useAuthStore());


</script>
<style scoped>

</style>
