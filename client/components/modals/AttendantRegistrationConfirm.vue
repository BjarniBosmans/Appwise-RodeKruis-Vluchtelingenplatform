<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
      <div class="p-6">
        <img class="w-full h-72 p-4 justify-center box-content" src="@/assets/account_added.svg"/>
        <p class=" text-3xl"><span class="text-accent-secondary">{{attendant.firstname}} {{attendant.lastname}}</span> {{ $t('is added')}}.</p>
        <br>
        <Button class="justify-end text-2xl" @click="$emit('closeRegConfirmAttendant')">{{ $t('Continue')}}</Button>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AttendantRegistrationConfirm",
  components: {Button},
  data:() => ({
    showRegResult: true,
  }),
  props:{
    attendant:{
      type: Object,
      required: true
    }
  }
}
</script>
