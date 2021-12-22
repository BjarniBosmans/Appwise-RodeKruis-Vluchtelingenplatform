<template>
<div class="fixed justify-center items-center inset-0 z-50 flex">
  <div  class="absolute flex flex-col bg-white rounded-lg h-screen top-0 right-0 p-16 items-center">
    <button class="absolute top-8 left-0 transform -translate-x-full bg-white p-2 text-2xl rounded-l w-12 hover:bg-dark-primary hover:text-white" @click="$emit('closeAttendantProfile')"> > </button>
    <button class="bg-white rounded w-4 h-12 top-4 right-8 absolute" @click="showOptions=!showOptions">
      <div class="rounded-lg absolute md:bottom-0 right-0 bg-gray-secondary transform translate-y-full z-20" v-if="showOptions">
        <button @click.prevent="deactivateAttendant" class="block px-1 w-full py-2 text-xl hover:bg-blue-200">{{ $t('Deactivate')}}</button>
      </div>
      <img class="object-cover h-8" alt="" src="@/assets/dots.png">
    </button>
    <img class="h-32 w-32" alt="" src="@/assets/Portrait_Placeholder.png"/>
    <p class="text-dark-primary text-2xl">{{attendant.firstname}} {{attendant.lastname}}</p>
    <br>
  <section>
    <p class="text-xl">Personal information:</p>
    <br>
    <div class="bg-gray-secondary rounded w-full p-2">
    <label class="text-xl p-2">{{ $t('Full name')}}</label>
    <p class="text-dark-primary text-xl p-2">{{attendant.firstname}} {{attendant.lastname}}</p>
    </div>
    <br>
    <div class="bg-gray-secondary rounded w-full p-2">
    <label class="text-xl p-2">Email</label>
    <p class="text-dark-primary text-xl p-2">{{attendant.email}}</p>
    </div>
    <br>
    <section>
      <p class="text-xl text-bold">{{ $t('Assigned refugees')}}</p>
      <button class="text-xl"></button>
      <div>

      </div>
    </section>
  </section>
  </div>
</div>
</template>

<script>
import Button from "../util/Button";
export default {
  name: "AttendantDrawer",
  components: {Button},

  props:{
    attendant:{
      type: Object,
      required: true
    }
  },
  methods:{
  deactivateAttendant(){
     this.$axios.delete(`/api/deactivateUser/${this.attendant.id}`)
    .then(() => {
      this.$emit("delete-attendant", this.attendant)
     })
       .then(() => {
         this.$emit('closeAttendantProfile')
       })
     .catch(error => console.log(error));
  }
  },data () {
    return {
      showOptions: false
    }
  },
}
</script>
