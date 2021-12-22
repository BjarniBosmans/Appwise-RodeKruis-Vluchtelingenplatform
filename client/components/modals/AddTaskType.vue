<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
<form>
  <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white py-20">
    <div class="px-44 py-8">
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
  <AddTaskTypeConfirm class="bg-black bg-opacity-25" :type="created_type" v-if="created_type" @closeTypeConfirm="created_type=null"/>
</div>
</template>

<script>
import Button from "../util/Button";
import AddTaskTypeConfirm from "./AddTaskTypeConfirm";
export default {
  name: "AddTaskType",
  components: {AddTaskTypeConfirm, Button},
  data:() => ({
    form: {
      kind: '',
      reward:''
    },
    created_type:null
  }),
  methods:{
    addType(){
      this.$axios.post('/api/types/add', this.form)
        .then(response => {
        this.created_type = response.data
      })
        .then(() => {
          this.$emit('addedType', this.created_type)})
        .catch(error => console.log(error));
    }
  }
}
</script>
