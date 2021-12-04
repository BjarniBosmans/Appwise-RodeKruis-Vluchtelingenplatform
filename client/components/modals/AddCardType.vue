<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
<form>
  <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
    <div class="p-4">
      <div class="flex justify-center items-center">
        <h1 class="text-5xl">
      <span class="text-accent-secondary">
        {{ $t('Add')}}
      </span>
          {{ $t('type')}}
        </h1>
      </div>
    </div>
    <div class="p-8">
        <div class="w-full p-2">
          <form @submit.prevent="addType">
          <label class="text-2xl p-2">
            {{ $t('Type')}}
          </label>
          <br>
          <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.kind" />
          <br>
          <label class="text-2xl p-2">
            {{ $t('Reward')}}
          </label>
          <br>
          <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.reward" id="max_ticks-input"/>
          <br><br>
            <div class="flex justify-between">
          <Button class="text-2xl" @click="$emit('closeNewType')">{{ $t('Back')}}</Button>
          <Button class="text-2xl">{{ $t('Add')}}</Button>
            </div>
          </form>
        </div>
    </div>
  </div>
</form>
</div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AddCardType",
  components: {Button},
  data:() => ({
    form: {
      kind: '',
      reward:''
    }
  }),
  methods:{
    addType(){
      this.$axios.post('/api/types/add', this.form)
        .then(response => console.log(response))
        .catch(error => console.log(error));
    }
  }
}
</script>
