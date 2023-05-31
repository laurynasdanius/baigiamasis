<script setup>
import { ref, defineProps } from 'vue';

// Define the props that you want to pass in
const props = defineProps({
  imgMaxWidth: Number,
});

// Set a default value for imgMaxWidth if no prop is passed in
let imgMaxWidth = props.imgMaxWidth ? ref(props.imgMaxWidth) : ref(80);
</script>

<template>
    <img :style="{ 'max-width': imgMaxWidth + 'px' }" src="images/logo.svg" alt="">
</template>