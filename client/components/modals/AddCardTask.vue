<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <form @submit.prevent="">
      <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
        <div class="px-44 py-8">
          <div class="flex justify-center items-center">
            <h1 class="text-5xl">
      <span class="text-accent-secondary">
        {{ $t('Add')}}
      </span>
              {{ $t('task')}}
            </h1>
          </div>
        </div>
        <div class="p-8">
          <div>
            <div class="w-full p-2">
              <div class="flex justify-between">
                <label class="text-2xl p-2">
                  {{ $t('Type')}}
                </label>
                <Button class="h-4 w-4 justify-center items-center float-right" type="button" @click="showAddnewType=true">+</Button>
              </div>
              <br>
              <select v-model="form.kind" class="text-2xl p-2 rounded bg-gray-secondary w-full" id="type_input">
                <option class="text-2xl p-2 rounded" v-for="type in types" :key="type.kind" :value="type">{{type.kind}}</option>
              </select>
              <br><br>
              <label class="text-2xl p-2">
                {{ $t('Reward')}}
              </label>
              <br><br>
              <div class="w-full bg-gray-secondary p-2 rounded">
                <input
                  class="text-2xl bg-gray-secondary w-full" v-model="form.reward" id="reward-input" value="type.kind"/>
              </div>
              <br>
              <label class="text-2xl p-2">
                {{ $t('Max ticks')}}
              </label>
              <br>
              <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.max_ticks" id="max_ticks-input"/>
            </div>
            <br>
          </div>
          <div class="justify-between flex items-center">
            <Button class="text-3xl" @click="$emit('closeNewTask')">{{ $t('Back')}}</Button>
            <Button class="text-3xl">{{ $t('Add')}}</Button>
          </div>
        </div>
      </div>
    </form>
    <AddTaskType class="bg-black bg-opacity-25" v-if="showAddnewType" @closeNewType="showAddnewType=false"/>
  </div>
</template>

<script>
import AddTaskType from "./AddTaskType";
import Button from "../util/Button";
export default {
  name: "AddCardTask",
  components: {AddTaskType, Button},
  props:{
  currentCard: {
    type: Object,
    required: true
  }
  },
  data:() => ({
    types: [],
    showAddnewType: false,
    form: {
    kind: '',
    reward: '',
    max_ticks: ''
    }
  }),
  mounted() {
    this.getTypes()
  },
  methods: {
    getTypes() {
      this.$axios.$get('/api/types')
        .then((resp) => {
          this.types = resp.types
        })
        .catch((err) => console.log(err))
    },
    addTask() {
    this.$axios.post()

    }
  }
}
</script>

