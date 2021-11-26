<template>
<button class="px-6 py-4 rounded-lg bg-gray-secondary text-dark-primary flex items-center
  hover:bg-dark-primary hover:text-white duration-200" @click="$emit('click')">
  <div v-if="$slots.icon" class="w-5 h-5">
    <slot name="icon"/>
  </div>
  <div class="font-bold ">
    <slot />
  </div>
</button>
</template>

<script>
export default {
  name: "Button"
}
</script>
