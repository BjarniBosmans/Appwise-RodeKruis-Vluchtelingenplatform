<template>
  <!--lijst-->
  <div>
    <div class="h-8 border-b-2 m-12">
      <div class="flex flex-wrap items-center justify-between">
      <div class="flex flex-wrap w-full  sm:w-auto">
        <button class=" right-0 text-xl bg-gray-200 text-black rounded p-4
       focus:text-white focus:bg-black hover:text-white hover:bg-black  w-full sm:w-auto" @click="showAttendants=true;showRefugees=false; showCards=false" autofocus>{{ $t('Attendants')}}</button>
        <button class=" left-0 text-xl bg-gray-200 text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black  w-full sm:w-auto" @click="showAttendants=false;showRefugees=true; showCards=false">{{ $t('Refugees')}}</button>
      <button class=" left-0 text-xl bg-gray-200 text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black  w-full sm:w-auto" @click="showAttendants=false;showRefugees=false; showCards=true">{{ $t('Cards')}}</button>
      </div>
        <div class="flex w-full sm:w-auto">
        <button v-if="showRefugees" class=" text-xl bg-gray-200 text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black  w-full sm:w-auto" @click="showRegistration=true">+{{ $t('Add')}}</button>
        <button v-if="showAttendants" class=" text-xl bg-gray-200 text-black rounded p-4
      focus:text-white focus:bg-black hover:text-white hover:bg-black  w-full sm:w-auto" @click="showRegistrationAttendant=true">+{{ $t('Add')}}</button>
        </div>
      </div>
<br>


      <!-- Attendants -->
      <div class="bg-gray-100 grid grid-cols-2 md:grid-cols-3 pb-8 justify-center items-center" v-if="showAttendants">
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block">
          {{ $t('Full name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
          Email<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
          {{ $t('Cards')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
      </div>
      <div  v-for="attendant in attendants" class="bg-gray-100 grid grid-cols-2 md:grid-cols-3 pb-8 justify-center items-center" v-if="showAttendants">
        <div class="column pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block" @click="">
          {{ attendant.firstname }} {{ attendant.lastname }}
        </div>
        <div class="columnpr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center" @click="">
          {{ attendant.email }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center" @click="">
          {{ attendant.Cards }}
        </div>
      </div>


      <!-- refugees -->
      <div class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center" v-if="showRefugees">
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
          {{ $t('Full name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
          {{ $t('Completed ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
          {{ $t('Country of origin')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center hidden md:block">
          {{ $t('Unique code')}}
        </div>
      </div>
      <div  v-for="refugee in refugees" class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center" v-if="showRefugees">
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

      <!--cards-->



      <div>
      </div>
      <AttendantRegistration class="bg-black bg-opacity-75" v-if="showRegistrationAttendant" @closeRegAttendant="showRegistrationAttendant=false"/>
      <RefugeeRegistration class="bg-black bg-opacity-75" v-if="showRegistration" @closeReg="showRegistration=false"/>
      <RefugeeDrawer v-if="toggleRefugeeProfile"/>
      <AttendantDrawer v-if="toggleAttendantProfile"/>
    </div>
  </div>
</template>

<script>
import RefugeeRegistration from "../modals/RefugeeRegistration";
import AttendantRegistration from "../modals/AttendantRegistration";
import RefugeeDrawer from "../drawers/RefugeeDrawer";
import AttendantDrawer from "../drawers/AttendantDrawer";
export default {
  name: "AdminList",
  components: {AttendantDrawer, RefugeeDrawer, AttendantRegistration, RefugeeRegistration},
  middleware: 'auth',
  data:() => ({
    refugees: [],
    attendants: [],
    showAttendants: true,
    showRefugees: false,
    showCards:false,
    showRegistration: false,
    showRegistrationAttendant:false,
    toggleRefugeeProfile: false,
    toggleAttendantProfile: false
  }),
mounted() {
  this.getRefugees()
  this.getAttendants()
},
methods:{
  getRefugees(){
    this.$axios.$get('/api/refugees')
      .then((resp) => {
        this.refugees= resp.users
      })
      .catch((err) => console.log(err))
  },
  getAttendants(){
    this.$axios.$get('/api/attendants')
    .then((resp) => {
      this.attendants= resp.users
    })
    .catch((err) => console.log(err))
  }
}

}
</script>
