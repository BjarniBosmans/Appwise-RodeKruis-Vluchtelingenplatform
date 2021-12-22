<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
      <div class="px-4 py-8">
        <img class="w-full h-72 p-4 justify-center box-content" src="@/assets/Flag_of_the_Red_Cross.svg.png"/>
        <p class=" text-3xl"><span class="text-accent-secondary">{{type.kind}}</span>{{ $t(' is added')}}.</p>
        <br>
        <Button class="justify-end text-2xl" @click="$emit('closeTypeConfirm')">{{ $t('Continue')}}</Button>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AddTaskTypeConfirm",
  components: {Button},
  props:{
    type:{
      type: Object,
      required: true
    }
  }
}
</script>

