<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <div class="bg-white rounded-lg p-2">
  <button class="text-dark-primary p-2 text-3xl rounded-l w-12 float-right" @click="$emit('closeCardDetail')"> X </button>
    <br>
  </div>
</div>
</template>

<script>
export default {
  name: "DetailCard",
  props:{
    card:{
      type: Object,
      required: true
    }
  },
}
</script>
