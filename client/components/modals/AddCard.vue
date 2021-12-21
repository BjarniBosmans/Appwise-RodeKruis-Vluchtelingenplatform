<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <form @submit.prevent="addCard">
<div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
<div class="px-44 py-8">
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
         <label class="text-2xl p-2">
           {{ $t('Name')}}
         </label>
       <br>
       <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.name" id="max_ticks-input"/>
       <br><br>
     <div class="w-full">
       <label class="text-2xl w-full">
         {{ $t('Refugee')}}
       </label>
       <br>
       <select class="text-2xl p-2 rounded bg-gray-secondary w-full" v-model="form.refugee_id">
         <option class="text-2xl rounded" v-for="refugee in refugees" :value="refugee.id">{{ refugee.firstname }} {{ refugee.lastname}} </option>
       </select>
     </div>
     <br><br>
       <div class="w-full p-2">
         <div class="justify-between">
         <label class="text-2xl">{{ $t('Tasks')}}</label>
         </div>
         <br><br>
         <div class="w-full grid-cols-1 " v-for="task in tasks">
           {{task.kind}}
         </div>
       </div>
   </div>
    <div class="justify-between flex items-center">
    <Button class="text-3xl" @click="$emit('closeNewCard')">{{ $t('Done')}}</Button>
    <Button class="text-3xl">{{ $t('Add')}} {{ $t('task')}}</Button>
    </div>
  </div>
</div>
</div>
  </form>
  <AddCardTask :currentCard="currentCard" class="bg-black bg-opacity-25" v-if="currentCard" @closeNewTask="currentCard=null"/>
</div>
</template>

<script>
import Button from "../util/Button";
import AddCardTask from "./AddCardTask";
export default {
  name: "AddCard",
  components: {AddCardTask, Button},
  middleware: 'auth',
  data:() => ({
    refugees: [],
    tasks:[],
    currentCard: null,
    form: {
      name: '',
      refugee_id: ''
    },
  }),
  mounted() {
    this.getRefugees()
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

        .then(response =>{
          this.currentCard= response.data} )
        .then(() => {
          this.$emit("addedCard", this.currentCard)})
        .catch(error => console.log(error));
    }
  }
}
</script>
