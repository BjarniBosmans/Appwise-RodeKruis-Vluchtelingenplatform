<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
      <div class="px-20 py-16">
        <img class="w-full h-72 p-4 justify-center box-content" src="@/assets/Flag_of_the_Red_Cross.svg.png"/>
        <p class=" text-3xl">{{ $t('New ')}}<span class="text-accent-secondary">{{ $t('task')}}</span> {{ $t(' is added')}}.</p>
        <br>
        <Button class="justify-end text-2xl" @click="$emit('closeTaskConfirm')">{{ $t('Done')}}</Button>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AddCardTaskConfirm",
  components: {Button},
}
</script>

