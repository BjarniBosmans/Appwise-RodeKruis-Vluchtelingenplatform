<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <form @submit.prevent="addTask">
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
                <option class="text-2xl p-2 rounded" v-for="type in types">{{type.kind}}</option>
              </select>
              <br><br>
              <label class="text-2xl p-2">
                {{ $t('Reward')}}
              </label>
              <br><br>
              <div class="w-full bg-gray-secondary p-2 rounded">
                <input
                  class="text-2xl bg-gray-secondary w-full" v-model="form.reward" id="reward-input"/>
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
            <Button type="button" class="text-3xl" @click="$emit('closeNewTask')">{{ $t('Done')}}</Button>
            <Button type="submit" class="text-3xl">{{ $t('Add task to card')}}</Button>
          </div>
        </div>
      </div>
    </form>
    <AddTaskType class="bg-black bg-opacity-25" @addedType="onTypeAdded" v-if="showAddnewType" @closeNewType="showAddnewType=false"/>
    <AddCardTaskConfirm class="bg-black bg-opacity-25" v-if="created_task" @closeTaskConfirm="created_task=null"/>
  </div>
</template>

<script>
import AddTaskType from "./AddTaskType";
import Button from "../util/Button";
import AddCardTaskConfirm from "./AddCardTaskConfirm";
export default {
  name: "AddCardTask",
  components: {AddCardTaskConfirm, AddTaskType, Button},
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
    },
    created_task:null,
  }),
  mounted() {
    this.getTypes()
  },
  computed: {
    currentCardId() {
      return this.currentCard.id
    }
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
      this.$axios.post('/api/cards/tasks/add', {
        kind: this.form.kind,
        reward: this.form.reward,
        ticks: 0,
        max_ticks: this.form.max_ticks,
        card_id: this.currentCardId
      })
        .then(response => {
          this.created_task = response.data
        })
        .then(() => {
          this.$emit('addedTask', this.created_task)
        })
        .catch(error => console.log(error))
     },
    onTypeAdded(type){
      this.types.push(type)
    }
  }
}
</script>

