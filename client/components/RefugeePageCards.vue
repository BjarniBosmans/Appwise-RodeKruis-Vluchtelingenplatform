<template>
<div>
<button class="text-dark-primary p-2 text-3xl rounded-l w-12 float-right" @click="$emit('closeCardDetail')">X</button>
  <br><br>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 flex justify-between items-center">
<div class= "w-full
   bg-gray-primary text-xl p-6 my-8 rounded-lg flex justify-between items-center hover:bg-gray-secondary" v-for="task in tasks">
  <div>{{ task.kind }}</div>
  <div class="flex flex-wrap">
    <div v-for="(tick, tickindex) in task.max_ticks">
<!--      {{tickindex>= task.ticks?"a": "b"}}-->
      <input type="radio" :checked="tickindex < task.ticks" class="pointer-events-none h-6 w-6 m-0.5">
    </div>
  </div>
</div>
  </div >
</div>
</template>
<script>
export default {
  name: "RefugeePageCards",
  data:() => ({
    tasks: []
  }),
  props:{
    currentCard:{
      type: Object,
      required: true
    }
  },
  computed: {
    currentCardId() {
      return this.currentCard.id
    }
  },
  mounted() {
    this.getCardTasks()
  },
  methods:{
  getCardTasks(){
  this.$axios.get(`/api/cards/tasks/${this.currentCardId}`)
    .then((resp) =>{
      this.tasks= resp.data.tasks
    })
    .catch((err) => console.log(err))
  }
  }
}
</script>
