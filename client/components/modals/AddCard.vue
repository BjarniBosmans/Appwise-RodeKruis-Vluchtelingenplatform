<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <form @submit.prevent="addCard">
<div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
<div class="p-6">
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
   <div class="justify-center">
     <section class="w-full p-4">
       <label class="text-2xl p-2">
         {{ $t('Kind')}}
       </label>
       <br>
       <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.kind" id="kind-input"/>
     </section>
     <br>
     <section class="w-full p-4">
       <label class="text-2xl p-2">
         {{ $t('Reward')}}
       </label>
       <br>
       <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.reward" id="reward-input"/>
     </section>
     <br>
     <section class="w-full p-4">
       <label class="text-2xl p-2">
         {{ $t('Max ticks')}}
       </label>
       <br>
       <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.max_ticks" id="max_ticks-input"/>
     </section>
     <br>
     <section class="w-full p-4">
       <label class="text-2xl">
         {{ $t('Refugee')}}
       </label>
       <br>
       <select class="text-2xl p-2 rounded bg-gray-secondary" >
         <option class="text-2xl p-2 rounded" v-model="form.refugee_id" v-for="refugee in refugees">{{ refugee.firstname }}  {{ refugee.lastname}} </option>
       </select>
     </section>
     <br><br>
   </div>
    <div class="justify-between flex items-center">
    <Button class="text-3xl" @click="$emit('closeNewCard')">{{ $t('Back')}}</Button>
    <Button class="text-3xl" >{{ $t('Add')}}</Button>
    </div>
  </div>
</div>
  </form>
</div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AddCard",
  components: {Button},
  middleware: 'auth',
  data:() => ({
    refugees: [],
    form: {
      kind: '',
      reward:'',
      max_ticks: '',
      refugee_id: ''
    }
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
        .then(response => console.log(response))
        .catch(error => console.log(error));
    }
  }
}
</script>
