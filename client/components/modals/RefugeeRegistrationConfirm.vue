<template >
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
      <div class="p-6">
        <img class="w-full h-72 p-4 justify-center box-content" src="@/assets/account_added.svg"/>
        <br>
        <p class=" text-3xl"><span class="text-accent-secondary">{{refugee.firstname}} {{refugee.lastname}}</span> {{ $t('is added')}}.</p>
        <br>
        <p class=" text-4xl">{{ $t('Their unique code:')}}</p>
        <br>
        <p class="text-4xl">{{refugee.unique_code}}</p>
        <br>
        <Button class="justify-end text-2xl" @click="$emit('closeRegConfirm')">{{ $t('Continue')}}</Button>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "RefugeeRegistrationConfirm",
  components: {Button},
  props:{
    refugee:{
      type: Object,
      required: true
    }
  },
  data:() => ({
    showRegResult: true,
  })
}
</script>
