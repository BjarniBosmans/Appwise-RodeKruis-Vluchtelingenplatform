<template>
<div>
  <h1 class="text-5xl font-medium text-dark-primary p-2">{{ $auth.user.firstname }} {{ $auth.user.lastname }}</h1>
  <p class="text-2xl text-dark-primary p-4">{{$t('Reward')}} {{$t('card')}}</p>
  <br>
  <div class="grid grid-cols-1 md:grid-cols-2 w-1/3 gap-3
   bg-gray-primary text-xl flex justify-between items-center p-6 my-8 rounded-lg" v-for="card in cards" @click="selectedCardDetail=card; cardList=false" v-if="cardList">
 <div>{{ card.name}}</div>
    <div>{{card.ticks}}
    /
  {{card.total_ticks}}
  completed
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
