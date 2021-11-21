<template>
  <!--lijst-->
  <div>
  <div class="h-8 border-b-2 m-12">
    <section class="">
      <button class="float-left right-0 text-xl bg-gray-200 text-black rounded p-4
       focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="tableSwitch=false" autofocus>Refugees</button>
      <button class="float-left left-0 text-xl bg-gray-200 text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="tableSwitch=true">Cards</button>
      <button class="float-right text-xl bg-gray-200 text-black rounded p-4 justify-center items-center
      focus:text-white focus:bg-black hover:text-white hover:bg-black flex w-1/4 h-16 overflow-clip" @click="showRegistration=!showRegistration">+Add</button>
    </section>
    <br><br><br>

    <div class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center" v-if="!tableSwitch">
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        Full name<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        Completed Ticks<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        Country of origin<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block">
        Unique code
      </div>
      </div>
      <div  v-for="refugee in refugees" class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center" v-if="!tableSwitch">
        <div class="column pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center" @click="">
        {{ refugee.firstname }} {{ refugee.lastname }}
        </div>
        <div class="columnpr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center" @click="">
        {{ refugee.total_ticks }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center" @click="">
        {{ refugee.country_of_origin }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block" @click="">
        {{ refugee.unique_code }}
        </div>
      </div>
    </div>

    <RefugeeRegistration v-if="showRegistration" @closeReg="showRegistration=false"/>
  </div>
</template>

<script>
import RefugeeRegistration from "../modals/RefugeeRegistration";
export default {
  name: "AttendantList",
  components: {RefugeeRegistration},
  middleware: 'auth',

  data:() => ({
    refugees: [],
    tableSwitch: false,
    showRegistration: false,
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
    }
  }
}
</script>
