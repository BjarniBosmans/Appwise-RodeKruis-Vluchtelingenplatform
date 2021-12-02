<template>
<div>
  <h1 class="text-5xl font-medium text-dark-primary">{{ $auth.user.firstname }} {{ $auth.user.lastname }}</h1>
  <p>{{$t('Reward')}} {{$t('card')}}</p>
  <br>
  <div class="grid grid-cols-1 md:grid-cols-2">
  <div v-for="card in cards">
  <p>{{ card.kind}}</p>
  <div>

  </div>
  </div>
  </div>
  <DetailCard v-if="toggleCardDetail"/>
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
    toggleCardDetail: false
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
