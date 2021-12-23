<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <div class="bg-white max-w-8xl rounded-lg shadow-lg p-4">
  <div class="flex justify-between ">
  <div class="left-0">
  <label class="text-2xl">{{ $t('Name')}}: <span class="text-accent-secondary">{{card.name}}</span></label>
    <br>
  <label class="text-2xl">{{ $t('Refugee')}}:  <span class="text-accent-secondary">{{card.refugee_id}}</span></label>
  </div>
  <div class="right-0">
  <button class="text-dark-primary p-2 text-3xl rounded-l w-12" @click="$emit('closeCardDetail')"> X </button>
  </div>
  </div>
    <div class= "w-full
   bg-gray-primary text-2xl my-8 rounded-lg flex justify-between items-center hover:bg-gray-secondary px-44 py-8 " v-for="task in tasks">
      <div>{{ task.kind }}</div>
      <div></div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "DetailCard",
  data:() => ({
    tasks: []
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
