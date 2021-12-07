<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <form @submit.prevent="addCard">
<div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
<div class="p-8">
  <div class="flex justify-center items-center">
    <h1 class="text-5xl">
      <span class="text-accent-secondary">
        {{ $t('Add')}}
      </span>
      {{ $t('card')}}
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
       <button class="px-6 rounded-lg bg-gray-secondary text-dark-primary flex items-center
  hover:bg-dark-primary hover:text-white duration-200 w-2 justify-center text-2xl" type="button" @click="showAddnewType=true">+</button>
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
         class="text-2xl bg-gray-secondary" v-model="form.reward" id="reward-input" value="type.kind"/>
       </div>
     <br>
       <label class="text-2xl p-2">
         {{ $t('Max ticks')}}
       </label>
       <br>
       <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.max_ticks" id="max_ticks-input"/>
     </div>
     <br>
     <div class="w-full px-4">
       <label class="text-2xl w-full">
         {{ $t('Refugee')}}
       </label>
       <br>
       <select class="text-2xl p-2 rounded bg-gray-secondary w-full" v-model="form.refugee_id">
         <option class="text-2xl rounded"  v-for="refugee in refugees" :value="refugee.id">{{ refugee.firstname }} {{ refugee.lastname}} </option>
       </select>
     </div>
     <br><br>
   </div>
    <div class="justify-between flex items-center">
    <Button class="text-3xl" @click="$emit('closeNewCard')">{{ $t('Back')}}</Button>
    <Button class="text-3xl">{{ $t('Add')}}</Button>
    </div>
  </div>
</div>
  </form>
  <AddCardType class="bg-black bg-opacity-75" v-if="showAddnewType" @closeNewType="showAddnewType=false"/>
</div>
</template>

<script>
import Button from "../util/Button";
import AddCardType from "./AddCardType";
export default {
  name: "AddCard",
  components: {AddCardType, Button},
  middleware: 'auth',
  data:() => ({
    refugees: [],
    types: [],
    showAddnewType: false,
    form: {
      kind: '',
      reward:'',
      ticks:'0',
      max_ticks: '',
      refugee_id: ''
    }
  }),
  mounted() {
    this.getRefugees()
    this.getTypes()
  },
  methods:{
    getRefugees(){
      this.$axios.$get('/api/refugees')
        .then((resp) => {
          this.refugees= resp.users
        })
        .catch((err) => console.log(err))
    },
    addCard(){
      this.$axios.post('/api/cards/add', this.form)
        .then(response => console.log(response))
        .catch(error => console.log(error));
    },
    getTypes(){
      this.$axios.$get('/api/types')
        .then((resp) => {
          this.types= resp.types
        })
        .catch((err) => console.log(err))
    }
  }
}
</script>
