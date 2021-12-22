<template>
  <!--lijst-->
  <div>
    <div class="px-10 mt-10">
      <div class="flex flex-wrap items-center justify-between">
      <div class="flex flex-wrap w-full  sm:w-auto">
        <Button class=" right-0 w-full sm:w-auto justify-center focus:bg-dark-primary focus:text-white" @click="showAttendants=true;showRefugees=false; showCards=false" autofocus>{{ $t('Attendants')}}</Button>
        <Button class=" left-0 w-full sm:w-auto justify-center focus:bg-dark-primary focus:text-white" @click="showAttendants=false;showRefugees=true; showCards=false">{{ $t('Refugees')}}</Button>
      <Button class=" left-0 w-full sm:w-auto justify-center focus:bg-dark-primary focus:text-white" @click="showAttendants=false;showRefugees=false; showCards=true">{{ $t('Cards')}}</Button>
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
      <div class="p-4 bg-gray-secondary grid grid-cols-2 md:grid-cols-3 flex justify-center items-center rounded-t-lg" v-if="showAttendants">
        <div class="text-xl truncate flex items-center">
          {{ $t('Full name') }}
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>

        <div class="text-xl truncate flex justify-center items-center  hidden md:block">
          Email
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>

        <div class="text-xl truncate flex justify-center items-center">
          {{ $t('Assigned refugees')}}
          <button class="">
            <img class="h-4 w-4" src="@/assets/arrows.svg">
          </button>
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
        <div  v-for="attendant in attendants" @click="selectedAttendantProfile=attendant" class="p-4 grid grid-cols-2 md:grid-cols-3 flex justify-center items-center hover:bg-gray-secondary" v-if="showAttendants">
          <div class="column text-xl truncate flex items-center" >
            {{ attendant.firstname }} {{ attendant.lastname }}
          </div>
          <div class="column  text-xl truncate flex justify-center items-center hidden md:block">
            {{ attendant.email }}
          </div>
          <div class="column  text-xl truncate flex justify-center items-center">
            {{ attendant.Cards }}
          </div>
        </div>
      </div>


      <!-- refugees -->
      <div class="p-4 bg-gray-secondary grid grid-cols-2 md:grid-cols-4 flex justify-center items-center rounded-t-lg" v-if="showRefugees">
        <div class=" text-xl truncate flex items-center">
          {{ $t('Full name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex justify-center items-center hidden md:block">
          {{ $t('Completed ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex justify-center items-center hidden md:block">
          {{ $t('Country of origin')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class="text-xl truncate flex justify-center items-center ">
          {{ $t('Unique code')}}
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
      <div  v-for="refugee in refugees" class="p-4 bg-gray-primary grid grid-cols-2 md:grid-cols-4 flex justify-center items-center hover:bg-gray-secondary" v-if="showRefugees">
        <div class="column text-xl truncate flex items-center" @click="selectedRefugeeProfile=refugee">
          {{ refugee.firstname }} {{ refugee.lastname }}
        </div>
        <div class="column text-xl truncate flex justify-center items-center hidden md:block" @click="selectedRefugeeProfile=refugee">
          {{ refugee.total_ticks }}
        </div>
        <div class="column text-xl truncate flex justify-center items-center hidden md:block" @click="selectedRefugeeProfile=refugee">
          {{ refugee.country_of_origin }}
        </div>
        <div class="column text-xl truncate flex justify-center items-center" @mouseenter="hoverId=refugee.id" @mouseleave="hoverId=null">
          <p id="refugee_UniqueCode" v-if="hoverId!==refugee.id && unique_codeIsHidden===false">{{ refugee.unique_code }}</p>
          <p v-if="hoverId!==refugee.id && unique_codeIsHidden===true">******</p>
          <button class="hover:opacity-50" type="button" @click="unique_codeIsHidden=!unique_codeIsHidden" v-if="hoverId===refugee.id"><img class="h-full w-8" src="@/assets/eye-icon.png"></button>
        </div>
      </div>
      </div>


      <!--cards-->
      <div class="p-4 bg-gray-secondary grid grid-col-2 md:grid-cols-3 flex justify-center items-center rounded-t-lg" v-if="showCards">
        <div class="text-xl truncate flex items-center">
          {{ $t('Name')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex justify-center items-center hidden md:block">
          {{ $t('Ticks')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
        <div class=" text-xl truncate flex justify-center items-center">
          {{ $t('Refugee')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
        </div>
      </div>
      <div class="bg-gray-primary rounded-b-lg">
      <div v-for="card in cards" @click="selectedCardDetail=card" class="p-4 bg-gray-primary grid grid-cols-2 md:grid-cols-3 flex justify-center items-center hover:bg-gray-secondary" v-if="showCards">
        <div  class="column text-xl truncate flex items-center">
          {{card.name}}
        </div>
        <div  class="column text-xl truncate flex justify-center items-center hidden md:block">
          {{card.ticks}}
        </div>
        <div class="column text-xl truncate flex justify-center items-center">
          {{card.refugee_id}}
        </div>
      </div>
      </div>

      <AttendantRegistration class="bg-black bg-opacity-75" v-if="showRegistrationAttendant" @addedAttendant="onAttendantAdded" @closeRegAttendant="showRegistrationAttendant=false"/>
      <RefugeeRegistration class="bg-black bg-opacity-75" v-if="showRegistration" @addedRefugee="onRefugeeAdded" @closeReg="showRegistration=false"/>
      <AddCard class="bg-black bg-opacity-75" v-if="showAddnewCard" @addedCard="onCardAdded" @closeNewCard="showAddnewCard=false"/>
      <RefugeeDrawer :refugee="selectedRefugeeProfile" @delete-refugee="onRefugeeDelete" class="bg-black bg-opacity-75" v-if="selectedRefugeeProfile" @closeRefugeeProfile="selectedRefugeeProfile=null"/>
      <AttendantDrawer :attendant="selectedAttendantProfile" @delete-attendant="onAttendantDelete" class="bg-black bg-opacity-75" v-if="selectedAttendantProfile" @closeAttendantProfile="selectedAttendantProfile=null"/>
      <DetailCard :card="selectedCardDetail" class="bg-black bg-opacity-75" v-if="selectedCardDetail" @closeCardDetail="selectedCardDetail=null"/>
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
import DetailCard from "../modals/DetailCard";
export default {
  name: "AdminList",
  components: {
    DetailCard,
    AddCard, ChevronRight, Button, AttendantDrawer, RefugeeDrawer, AttendantRegistration, RefugeeRegistration},
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
    selectedRefugeeProfile: null,
    selectedAttendantProfile: null,
    selectedCardDetail: null,
    unique_codeIsHidden: true,
    hoverId: null
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
  showRefugeeName(refugee){
    this.$axios.$get(`/api/refugee/${refugee.id}`)
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
  },
  onAttendantAdded(user){
    this.attendants.push(user)
  },
  onAttendantDelete(user){
    const index= this.attendants.findIndex(userInArray => userInArray.id === user.id)
    this.attendants.splice(index, 1)
  },
  onRefugeeAdded(user){
  this.refugees.push(user)
  },
  onRefugeeDelete(user){
    const index = this.refugees.findIndex(userInArray => userInArray.id === user.id)
    this.refugees.splice(index, 1)
  },
  onCardAdded(card){
    this.cards.push(card)
  }
}

}
</script>
