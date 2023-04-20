<script setup>

const props = defineProps({
  actions: {
    type: Array,
    required: true,
    default: () => [],
  },
  item: {
    type: Object,
    required: true,
  },
});


function onClick(action, item) {
  if (typeof action.onClick === 'function') {
    action.onClick(item);
  }
}
</script>

<template>
  <div class="flex space-x-2">
    <button v-for="action in actions" :key="action.label" @click="onClick(action, item)" 
      class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
      :class="action.class">
      <i :class="action.icon"></i>
      <span>{{ action.label }}</span>
    </button>
  </div>
</template>