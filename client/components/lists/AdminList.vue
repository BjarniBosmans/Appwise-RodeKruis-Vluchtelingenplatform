<template>
  <!--lijst-->
  <div>
    <div class="px-10 mt-10">
      <div class="flex flex-wrap items-center justify-between">
      <div class="flex flex-wrap w-full  sm:w-auto">
        <Button class=" right-0 w-full sm:w-auto justify-center" @click="showAttendants=true;showRefugees=false; showCards=false" autofocus>{{ $t('Attendants')}}</Button>
        <Button class=" left-0 w-full sm:w-auto justify-center" @click="showAttendants=false;showRefugees=true; showCards=false">{{ $t('Refugees')}}</Button>
      <Button class=" left-0 w-full sm:w-auto justify-center" @click="showAttendants=false;showRefugees=false; showCards=true">{{ $t('Cards')}}</Button>
      </div>
        <div class="flex w-full sm:w-auto">
        <Button v-if="showRefugees" class=" w-full sm:w-auto justify-center" @click="showRegistration=true">
          <template #icon>

          </template>
          {{ $t('Add')}}
        </Button>
        <Button v-if="showAttendants" class=" w-full sm:w-auto justify-center" @click="showRegistrationAttendant=true">{{ $t('Add')}}</Button>
        <Button v-if="showCards" class=" w-full sm:w-auto justify-center" @click="showAddnewCard=true">{{ $t('Add')}}</Button>
        </div>
      </div>
<br>

      <!-- Attendants -->
      <div class="p-4 bg-gray-secondary grid grid-cols-2 md:grid-cols-3 justify-center items-center rounded-t-lg" v-if="showAttendants">
        <div class="text-xl truncate flex items-center hidden md:block">
          {{ $t('Full name') }}
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>

        <div class="text-xl truncate flex items-center">
          Email
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>

        <div class="text-xl truncate flex items-center">
          {{ $t('Cards')}}
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
        <div  v-for="attendant in attendants" class="p-4 grid grid-cols-2 md:grid-cols-3 justify-center items-center" v-if="showAttendants">
          <div class="column text-xl truncate flex items-center hidden md:block" @click="">
            {{ attendant.firstname }} {{ attendant.lastname }}
          </div>
          <div class="column  text-xl truncate flex items-center" @click="">
            {{ attendant.email }}
          </div>
          <div class="column  text-xl truncate flex items-center" @click="">
            {{ attendant.Cards }}
          </div>
        </div>
      </div>


      <!-- refugees -->
      <div class="p-4 bg-gray-secondary grid grid-cols-2 md:grid-cols-4 justify-center items-center" v-if="showRefugees">
        <div class=" text-xl truncate flex items-center">
          {{ $t('Full name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex items-center hidden md:block">
          {{ $t('Completed ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex items-center">
          {{ $t('Country of origin')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="text-xl truncate flex items-center hidden md:block">
          {{ $t('Unique code')}}
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
      <div  v-for="refugee in refugees" class="p-4 bg-gray-primary grid grid-cols-2 md:grid-cols-4  justify-center items-center" v-if="showRefugees">
        <div class="column text-xl truncate flex items-center" @click="">
          {{ refugee.firstname }} {{ refugee.lastname }}
        </div>
        <div class="column text-xl truncate flex items-center hidden md:block" @click="">
          {{ refugee.total_ticks }}
        </div>
        <div class="column text-xl truncate flex items-center" @click="">
          {{ refugee.country_of_origin }}
        </div>
        <div class="column text-xl truncate flex items-center hidden md:block" @click="">
          {{ refugee.unique_code }}
        </div>
      </div>
      </div>


      <!--cards-->
      <div class="p-4 bg-gray-secondary grid grid-col-2 md:grid-cols-4 justify-center items-center" v-if="showCards">
        <div class=" text-xl truncate flex items-center">
          {{ $t('Kind')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex items-center hidden md:block">
          {{ $t('Reward')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex items-center hidden md:block">
          {{ $t('Ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex items-center">
          {{ $t('Refugee')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
      <div v-for="card in cards" class="p-4 bg-gray-primary grid grid-cols-2 md:grid-cols-4 justify-center items-center" v-if="showCards">
        <div  class="column text-xl truncate flex items-center">
          {{card.kind}}
        </div>
        <div class="column text-xl truncate flex items-center hidden md:block">
          {{card.reward}}
        </div>
        <div  class="column text-xl truncate flex items-center hidden md:block">
          {{card.ticks}}
        </div>
        <div  class="column text-xl truncate flex items-center">
          {{card.refugee_id}}
        </div>
      </div>
      </div>

      <div>
      </div>
      <AttendantRegistration class="bg-black bg-opacity-75" v-if="showRegistrationAttendant" @closeRegAttendant="showRegistrationAttendant=false"/>
      <RefugeeRegistration class="bg-black bg-opacity-75" v-if="showRegistration" @closeReg="showRegistration=false"/>
      <AddCard class="bg-black bg-opacity-75" v-if="showAddnewCard" @closeNewCard="showAddnewCard=false"/>
      <RefugeeDrawer class="bg-black bg-opacity-75" v-if="toggleRefugeeProfile"/>
      <AttendantDrawer class="bg-black bg-opacity-75" v-if="toggleAttendantProfile"/>
    </div>
  </div>
</template>

<script>
import RefugeeRegistration from "../modals/RefugeeRegistration";
import AttendantRegistration from "../modals/AttendantRegistration";
import RefugeeDrawer from "../drawers/RefugeeDrawer";
import AttendantDrawer from "../drawers/AttendantDrawer";
import Button from "../util/Button";
import ChevronRight from "../icons/chevron-down";
import AddCard from "../modals/AddCard";
export default {
  name: "AdminList",
  components: {AddCard, ChevronRight, Button, AttendantDrawer, RefugeeDrawer, AttendantRegistration, RefugeeRegistration},
  middleware: 'auth',
  data:() => ({
    refugees: [],
    attendants: [],
    cards: [],
    showAttendants: true,
    showRefugees: false,
    showCards:false,
    showRegistration: false,
    showRegistrationAttendant:false,
    showAddnewCard: false,
    toggleRefugeeProfile: false,
    toggleAttendantProfile: false,
    toggleCardDetail: false
  }),
mounted() {
  this.getRefugees()
  this.getAttendants()
  this.getCards()
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
  },

  getCards(){
    this.$axios.$get('/api/cards')
    .then((resp) =>{
      this.cards= resp.cards
    })
    .catch((err) => console.log(err))
  }
}

}
</script>
