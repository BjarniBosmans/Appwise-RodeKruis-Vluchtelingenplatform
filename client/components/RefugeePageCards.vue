<template>
<div>
<button class="text-dark-primary p-2 text-3xl rounded-l w-12 float-right" @click="$emit('closeCardDetail')">X</button>
<div class="flex flex-col grid grid-cols-1 md:grid-cols-2 bg-gray-primary text-xl gap-3 justify-between items-center p-6 my-8 w-1/3 rounded-lg" v-for="task in tasks">
  <div>{{task.kind}}</div>
  <div></div>
</div>
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
  mounted() {
  this.getCardTasks()
  },
  methods:{
  getCardTasks(){
  this.$axios.get(`/cards/tasks/${this.currentCard}`)
    .then((resp) =>{
      this.tasks= resp.tasks
    })
    .catch((err) => console.log(err))
  },
  }
}
</script>
