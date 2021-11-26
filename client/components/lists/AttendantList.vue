<template>
  <!--lijst-->
  <div>
  <div class="px-10">
    <section class="">
      <button class="float-left right-0 text-xl bg-gray-secondary text-black rounded p-4
       focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="tableSwitch=false" autofocus>{{ $t('Refugees')}}</button>
      <button class="float-left left-0 text-xl bg-gray-secondary text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="tableSwitch=true">{{ $t('Cards')}}</button>
      <button class="float-right text-xl bg-gray-secondary text-black rounded p-4 justify-center items-center
      focus:text-white focus:bg-black hover:text-white hover:bg-black flex w-1/4 h-16 overflow-clip" @click="showRegistration=!showRegistration">+{{ $t('Add')}}</button>
    </section>
    <br>

    <!-- refugees -->
    <div class="bg-gray-primary grid grid-cols-3 md:grid-cols-4 justify-center items-center" v-if="!tableSwitch">
      <div class="bg-gray-secondary pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        {{ $t('Full name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-secondary pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        {{ $t('Completed ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-secondary pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        {{ $t('Country of origin')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
      </div>
      <div class="bg-gray-secondary pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block">
        {{ $t('Unique code')}}
      </div>
      </div>
      <div  v-for="refugee in refugees" class="bg-gray-primary grid grid-cols-3 md:grid-cols-4  justify-center items-center" v-if="!tableSwitch">
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

    <!-- cards -->

      <div>
<div/>
  </div>

    <RefugeeRegistration class="bg-black bg-opacity-75" v-if="showRegistration" @closeReg="showRegistration=false"/>
  </div>
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
