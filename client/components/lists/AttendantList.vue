<template>
  <!--lijst-->
  <div>
    <div class="px-10 mt-10">
      <div class="flex flex-wrap items-center justify-between">
        <div class="flex flex-wrap w-full  sm:w-auto">
          <Button class=" left-0 w-full sm:w-auto justify-center" @click="showRefugees=true; showCards=false">{{ $t('Refugees')}}</Button>
          <Button class=" left-0 w-full sm:w-auto justify-center" @click="showRefugees=false; showCards=true">{{ $t('Cards')}}</Button>
        </div>
        <div class="flex w-full sm:w-auto">
          <Button v-if="showRefugees" class=" w-full sm:w-auto justify-center" @click="showRegistration=true">
            <template #icon>

            </template>
            {{ $t('Add')}}
          </Button>
          <Button v-if="showCards" class=" w-full sm:w-auto justify-center" @click="showAddnewCard=true">{{ $t('Add')}}</Button>
        </div>
      </div>
    <br>

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
        <div  v-for="refugee in refugees" @click="selectedRefugeeProfile=refugee" class="p-4 bg-gray-primary grid grid-cols-2 md:grid-cols-4  justify-center items-center" v-if="showRefugees">
          <div class="column text-xl truncate flex items-center">
            {{ refugee.firstname }} {{ refugee.lastname }}
          </div>
          <div class="column text-xl truncate flex items-center hidden md:block">
            {{ refugee.total_ticks }}
          </div>
          <div class="column text-xl truncate flex items-center">
            {{ refugee.country_of_origin }}
          </div>
          <div class="column text-xl truncate flex items-center hidden md:block">
            {{ refugee.unique_code }}
          </div>
        </div>
      </div>

    <!-- cards -->
    <div class="p-4 bg-gray-secondary grid grid-col-2 md:grid-cols-4 justify-center items-center" v-if="showCards">
      <div class=" text-xl truncate flex items-center">
        {{ $t('Type')}}<button class="items-center"><img class="h-4 w-4" src="@/assets/arrows.svg"> </button>
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
<div/>
  </div>

    <RefugeeRegistration class="bg-black bg-opacity-75" v-if="showRegistration" @addedRefugee="onRefugeeAdded" @closeReg="showRegistration=false"/>
    <AddCard class="bg-black bg-opacity-75" v-if="showAddnewCard" @closeNewCard="showAddnewCard=false"/>
    <RefugeeDrawer :refugee="selectedRefugeeProfile" @delete-refugee="onRefugeeDelete"  class="bg-black bg-opacity-75" v-if="selectedRefugeeProfile" @closeRefugeeProfile="selectedRefugeeProfile=null"/>
    <DetailCard :card="selectedCardDetail" class="bg-black bg-opacity-75" v-if="selectedCardDetail" @closeCardDetail="selectedCardDetail=null"/>
  </div>
</template>

<script>
import RefugeeRegistration from "../modals/RefugeeRegistration";
import AddCard from "../modals/AddCard";
import RefugeeDrawer from "../drawers/RefugeeDrawer";
import Button from "../util/Button";
import ChevronRight from "../icons/chevron-down";
import DetailCard from "../modals/DetailCard";

export default {
  name: "AttendantList",
  components: {DetailCard, AddCard, RefugeeRegistration, RefugeeDrawer, Button, ChevronRight},
  middleware: 'auth',

  data:() => ({
    refugees: [],
    cards: [],
    showRefugees: true,
    showCards:false,
    showRegistration: false,
    showAddnewCard: false,
    selectedRefugeeProfile: false,
    selectedCardDetail: false
  }),
  mounted() {
    this.getRefugees()
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
    getCards(){
      this.$axios.$get('/api/cards')
        .then((resp) =>{
          this.cards= resp.cards
        })
        .catch((err) => console.log(err))
    },
    onRefugeeAdded(user){
      this.refugees.push(user)
    },
    onRefugeeDelete(user){
      const index = this.refugees.findIndex(userInArray => userInArray.id === user.id)
      this.refugees.splice(index, 1)
    }
  }
}
</script>
