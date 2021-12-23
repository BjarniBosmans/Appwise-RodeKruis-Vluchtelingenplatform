<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <div class="bg-white max-w-8xl rounded-lg shadow-lg px-4 py-2">
  <div class="flex justify-between px-4 py-1">
  <div class="left-0">
  <label class="text-3xl">{{ $t('Name')}}: <span class="text-accent-secondary">{{card.name}}</span></label>
    <br>
  <label class="text-3xl">{{ $t('Refugee')}}:  <span class="text-accent-secondary" v-for="refugee in currentRefugee">{{refugee.firstname}} {{refugee.lastname}}</span></label>
  </div>
  <div class="right-0">
  <button class="text-dark-primary p-2 text-3xl rounded-l w-12" @click="$emit('closeCardDetail')"> X </button>
  </div>
  </div>
    <div class= "w-full
   bg-gray-primary text-2xl my-8 rounded-lg flex justify-between items-center hover:bg-gray-secondary p-8" v-for="task in tasks">
      <div class="mr-24">{{ task.kind }}</div>
      <div class="flex flex-wrap">
        <div class="" v-for="(tick, tickindex) in task.max_ticks">
          <input type="radio" :checked="tickindex < task.ticks" class="h-6 w-6 m-0.5">
        </div>
      </div>
<!--      <div class="flex flex-wrap">-->
<!--        <label class="text-xl">{{ $t('Completed')}}: </label>-->
<!--        <input class="mr-4" type="checkbox" :checked="task.completed=true">-->
<!--        <label class="text-xl">{{ $t('Reward delivered')}}: </label>-->
<!--        <input type="checkbox" :checked="task.reward_delivered=true">-->
<!--      </div>-->
      </div>
  </div>
</div>
</template>

<script>
export default {
  name: "DetailCard",
  data:() => ({
    tasks: [],
    currentRefugee: []
  }),
  props:{
    card:{
      type: Object,
      required: true
    }
  },
  computed: {
    currentCardId() {
      return this.card.id
    },
    currentRefugeeId(){
      return this.card.refugee_id
    }
  },
  mounted() {
    this.getCardTasks()
    this.getRefugee()
  },
  methods:{
    getCardTasks(){
      this.$axios.get(`/api/cards/tasks/${this.currentCardId}`)
        .then((resp) =>{
          this.tasks= resp.data.tasks
        })
        .catch((err) => console.log(err))
    },
    getRefugee(){
      this.$axios.$get(`/api/refugee/${this.currentRefugeeId}`)
        .then((resp) =>{
          this.currentRefugee= resp.users
        })
        .catch((err) => console.log(err))
    }
  }
}
</script>
