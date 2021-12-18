<template>
<div>
  <h1 class="text-5xl font-medium text-dark-primary p-2">{{ $auth.user.firstname }} {{ $auth.user.lastname }}</h1>
  <p class="text-2xl text-dark-primary p-4">{{$t('Reward')}} {{$t('card')}}</p>
  <br>
  <div class="grid grid-cols-1 md:grid-cols-2" >
  <div v-for="card in cards" @click="selectedCardDetail=card">
  <p>{{ card.name}}</p>
  <div>
  {{card.ticks}}
    /
  {{card.total_ticks}}
  completed
  </div>
  </div>
  </div>
<RefugeePageCards :current-card="selectedCardDetail" v-if="selectedCardDetail"/>
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
    selectedCardDetail: false
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
