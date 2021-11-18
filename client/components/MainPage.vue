<template>
<div class="px-16 grid grid-rows-2 gap-3 border-b-2 w-full grid-cols-1 lg:grid-cols-statistics rounded">
  <section class="justify-center items-center bg-gray-200 border-b-4 px-2 pr-8 pl-8 row-span-2 p-32 rounded">
        <h1 class="text-5xl mb-2">
          Welkom
          <span class="text-5xl" style="color: red">
          naam
          </span>
        </h1>
    <p class="text-2xl">
      Lorem ipsum bla bla bla
    </p>
  </section>
  <section class="relative bg-gray-200 p-8 pr-8 pl-8 rounded">
    <img class="invisible z-10 absolute top-0 right-0 h-80 w-80 md:visible" src="@/assets/GEOMETRIC_HUMANS_EXPORT-01.svg"/>

    <p class="mb-2">Datum</p>
    <h1 class="text-4xl" id="dateNow"></h1>
  </section>
  <section class=" bg-gray-200 px-2 p-8 pr-8 pl-8 rounded">
  <p class="mb-2">Aantal vluchtelingen</p>
    <h1 class="text-4xl">{{ refugees.length }}</h1>
  </section>
  </div>
</template>

<script>
export default {
  name: "MainPage",
  middleware: 'auth',
  data:() => ({
    refugees: []
  }),
  mounted() {
    const date= new Date();
    document.getElementById('dateNow').textContent= date.toLocaleDateString();
    this.getRefugees();
  },
  methods: {
    getRefugees() {
      this.$axios.$get('/api/refugees')
        .then((resp) => {
          this.refugees = resp.users
        })
        .catch((err) => console.log(err))
    }
  }
}
</script>

