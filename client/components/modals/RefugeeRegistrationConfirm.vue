<template >
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
      <div class="p-20">
        <img class="w-full h-80 p-4 justify-center box-content" src="@/assets/account_added.svg"/>
        <p class=" text-4xl"><span style="color: red">Firstname Name</span> {{ $t('is added')}}.</p>
        <p class=" text-2xl">{{ $t('Their unique code:')}}</p>
        <br>
        <p class="text-3xl">12345</p>
        <br>
        <button class="bg-black text-white justify-end text-2xl p-4" @click="$emit('closeRegConfirm')">{{ $t('Continue')}}</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RefugeeRegistrationConfirm",
  data:() => ({
    showRegResult: true,
  })
}
</script>
