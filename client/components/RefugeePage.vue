<template>
<div>
  <h1 class="text-5xl font-medium text-dark-primary p-2">{{ $auth.user.firstname }} {{ $auth.user.lastname }}</h1>
  <p class="text-2xl text-dark-primary p-4">{{$t('Reward')}} {{$t('card')}}</p>
  <br>
  <div class="grid grid-cols-1 md:grid-cols-2">
  <div v-for="card in cards">
  <p>{{ card.kind}}</p>
  <div>

  </div>
  </div>
  </div>
  <DetailCard v-if="selectedCardDetail"/>
</div>
</template>
<script>
import DetailCard from "./modals/DetailCard";
export default {
  name: "RefugeePage",
  components: {DetailCard},
  middleware:'auth',
  data:() => ({
    cards: [],
    selectedCardDetail: false
  }),
  methods:{
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
