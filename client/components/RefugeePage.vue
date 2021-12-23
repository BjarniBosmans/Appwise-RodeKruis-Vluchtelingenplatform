<template>
<div>
  <h1 class="text-5xl font-medium text-dark-primary p-2">{{ $auth.user.firstname }} {{ $auth.user.lastname }}</h1>
  <p class="text-2xl text-dark-primary p-4">{{$t('Reward')}} {{$t('card')}}</p>
  <br>
  <div  class="grid grid-cols-1 md:grid-cols-2 gap-x-8 flex justify-between items-center">
  <div class="w-full
   bg-gray-primary text-xl p-6 my-8 rounded-lg flex justify-between items-center hover:bg-gray-secondary" v-for="card in cards" @click="selectedCardDetail=card; cardList=false" v-if="cardList">
 <div>{{ card.name}}</div>
    <div>{{card.ticks}}
    /
  {{card.total_ticks}}
      {{$t('completed')}}
      </div>
  </div>
  </div>
<RefugeePageCards :currentCard="selectedCardDetail" v-if="selectedCardDetail" @closeCardDetail="selectedCardDetail=null; cardList=true"/>
</div>
</template>
<script>
import RefugeePageCards from "./RefugeePageCards";
export default {
  name: "RefugeePage",
  components: {RefugeePageCards},
  middleware:'auth',
  data:() => ({
    cards: [],
    selectedCardDetail: false,
    cardList: true,
    completedCard: false
  }),
  mounted() {
    this.getCardsForRefugee()
  },
  computed: {
    currentUserId() {
      return this.$auth.user.id
    }
  },
  methods:{
    getCardsForRefugee(){
      this.$axios.$get(`/api/cards/refugee/${this.currentUserId}`)
        .then((resp) =>{
          this.cards= resp.cards
        })
        .catch((err) => console.log(err))
    }
  }
}
</script>
