<template>
  <!--lijst-->
  <div>
  <div class="h-8 border-b-2 m-12">
    <section class="">
      <button class="float-left right-0 text-xl bg-black text-white rounded p-4">Vluchtelingen</button>
      <button class="float-left left-0 text-xl bg-gray-200 rounded p-4">Kaarten</button>
      <button class="float-right text-xl bg-gray-200 rounded p-4" @click="showRegistration=!showRegistration">+Vluchteling toevoegen</button>
    </section>
    <br><br><br>

    <div class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center">
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate flex items-center">
        Volledige naam
      </div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate">Voltooide ticks</div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate">Land van afkomst</div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-8 text-2xl truncate hidden md:block">Unieke code</div>
      </div>
      <div  v-for="refugee in refugees" class="bg-gray-100 p-8 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center">
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl ">
        {{ refugee.firstname }} {{ refugee.lastname }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl">
        {{ refugee.total_ticks }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl">
        {{ refugee.country_of_origin }}
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl hidden md:block">
        {{ refugee.unique_code }}
        </div>
      </div>
    </div>


  <div v-if="showRegistration">
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
    <div class="p-20">
    <div class="flex justify-center items-center">
    <h1 class="text-5xl">
      <span style="color: blue">
       Toevoegen
      </span>
      vluchteling
    </h1>
    </div>
    </div>
      <div class="p-8">
        <div class="justify-center">
        <section class="bg-gray-200 rounded p-4 w-5/12 float-left">
          <label class="text-gray-500 text-2xl">Voornaam</label>
          <br>
          <input class="bg-gray-200 rounded w-full text-2xl" id="voornaamInput"/>
        </section>
        <section class="bg-gray-200 rounded p-4 w-5/12  float-right">
          <label class="text-gray-500 text-2xl">Achternaam</label>
          <br>
          <input class="bg-gray-200 rounded w-full text-2xl" id="achternaamInput"/>
        </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-200 rounded p-4 w-full ">
        <label class="text-gray-500 text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full" />
        </section>
        <br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-gray-500 text-2xl">Land van herkomst</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full"/>
        </section>
      </div>
      <div class="p-8 flex justify-between items-center">
        <button class="text-3xl rounded p-2 border-gray-300 border-2" @click="showRegistration=!showRegistration">Terug</button>
        <button class="text-3xl bg-black text-white rounded p-2 border-gray-300 border-2" @click="showRegResult=!showRegResult">Toevoegen</button>
      </div>
    </div>
  </div>


    <div v-if="showRegResult">
    <div class="fixed justify-center items-center inset-0 z-50 flex">
      <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white p-8">
        <div class="p-20">
          <img class="w-full h-2/4 p-4 justify-center" src="@/assets/account_added.svg">
          <p class=" text-4xl"><span style="color: blue">Voornaam Naam</span> is toegevoegd.</p>
          <p class=" text-2xl">Hun unieke code:</p>
          <br>
          <p class="text-2xl">12345</p>
          <br>
          <button class="bg-black text-white justify-end text-2xl p-4" @click="showRegResult=!showRegResult">Doorgaan</button>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: "MentorList",
  middleware: 'auth',
  data:() => ({
    refugees: [],


      showRegistration: false,
      showRegResult: false

  }),
  mounted() {
    this.getRefugees()
  },
  methods:{
    getRefugees(){
      this.$axios.$get('/api/refugees')
      .then((resp) => {
       console.log(resp.users)
        this.refugees= resp.users
      })
      .catch((err) => console.log(err))
    }
  }
}
</script>
