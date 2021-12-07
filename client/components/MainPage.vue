<template>
<div class="px-10 grid grid-rows-2 gap-3 w-full grid-cols-1 lg:grid-cols-statistics rounded">
  <section class="flex flex-col bg-gray-secondary px-8 row-span-2 p-8 rounded-lg">
        <h1 class="text-5xl mb-4 font-medium text-dark-primary">
          {{ $t('Welcome')}}
          <span class="text-5xl" style="color: red" v-if="$auth.user">
          {{ $auth.user.firstname }}
          </span>
        </h1>
    <p class="text-2xl">
      {{ $t('This is your hub to manage all the people assigned to you, make sure to notify the person in question if something has changed for them.')}}
    </p>
  </section>
  <section class="relative bg-gray-secondary p-8 rounded-lg">
    <img class="invisible z-10 absolute top-0 -right-20 h-80 w-80 md:visible" src="@/assets/GEOMETRIC_HUMANS_EXPORT-01.svg"/>

    <p class="mb-2 text-xl">{{ $t('Cards')}}</p>
    <h1 class="text-4xl font-bold text-dark-primary">{{cards.length}}</h1>
  </section>
  <section class=" bg-gray-secondary p-8 rounded-lg">
  <p class="mb-2 text-xl">{{ $t('Number of refugees')}}</p>
    <h1 class="text-4xl font-bold text-dark-primary">{{ refugees.length }}</h1>
  </section>
  </div>
</template>

<script>
export default {
  name: "MainPage",
  middleware: 'auth',
  data:() => ({
    refugees: [],
    cards: []
  }),
  mounted() {
    this.getRefugees();
    this.getCards();
  },
  methods: {
    getRefugees() {
      this.$axios.$get('/api/refugees')
        .then((resp) => {
          this.refugees = resp.users
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

