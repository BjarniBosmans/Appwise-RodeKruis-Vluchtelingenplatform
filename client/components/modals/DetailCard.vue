<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <div class="bg-white rounded-lg p-2">
  <button class="text-dark-primary p-2 text-3xl rounded-l w-12 float-right" @click="$emit('closeCardDetail')"> X </button>
    <br><br>
  <div class="px-4 py-8 flex items-center justify-center">
    <label class="text-2xl px-4">{{ $t('Type')}}: </label>
    <label class="text-2xl px-4">{{card.kind}}</label>

    <label class="text-2xl px-4">{{ $t('Reward')}}: </label>
    <label class="text-2xl px-4">{{card.reward}}</label>

    <label class="text-2xl px-4">{{ $t('Refugee')}}: </label>
    <label class="text-2xl px-4">{{card.refugee_id}}</label>
  </div>
  <br>
    <div>

    </div>
    <br>
    <div class="flex justify-between px-4 py-4">
      <label class="text-2xl">Completed: </label>
      <input class="text-2xl" type="checkbox" value="card.completed"/>
      <label class="text-2xl">Reward Delivered: </label>
      <input class="text-2xl" type="checkbox" value="card.reward_delivered"/>
    </div>
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
