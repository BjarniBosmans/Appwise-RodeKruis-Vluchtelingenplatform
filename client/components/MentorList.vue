<template>
  <!--lijst-->
  <div class="h-8 border-b-2 m-12">
    <section class="">
      <button class="float-left right-0 text-xl bg-black text-white rounded p-4">Vluchtelingen</button>
      <button class="float-left left-0 text-xl bg-gray-200 rounded p-4">Kaarten</button>
      <button class="float-right text-xl bg-gray-200 rounded p-4" @click="showRegistration=!showRegistration">+Vluchteling toevoegen</button>
    </section>
    <br><br><br>

    <div class="bg-gray-100 grid grid-cols-3 md:grid-cols-4 pb-8 justify-center items-center">
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-6 text-2xl truncate">Volledige naam</div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-6 text-2xl truncate">Voltooide ticks</div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-6 text-2xl truncate">Land van afkomst</div>
      <div class="bg-gray-200 pr-8 pl-8 pt-6 pb-6 text-2xl truncate hidden md:block">Unieke code</div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl ">
        1
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl">
        1
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl">
        2
        </div>
        <div class="column pr-8 pl-8 pt-6 pb-6 text-2xl hidden md:block">
        2
        </div>

    </div>


  <div v-if="showRegistration">
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
    <div class="p-16">
    <div class="flex justify-center items-center">
    <h1 class="text-5xl">
      <span style="color: blue">
       Toevoegen
      </span>
      vluchteling
    </h1>
    </div>
    </div>
      <div class="p-6">
        <div class="justify-center">
        <section class="bg-gray-200 rounded p-4 w-5/12 float-left">
          <label class="text-gray-500 text-2xl">Voornaam</label>
          <br>
          <input class="bg-gray-200 rounded w-full text-2xl" id="voornaamInput" placeholder="Voornaam"/>
        </section>
        <section class="bg-gray-200 rounded p-4 w-5/12  float-right">
          <label class="text-gray-500 text-2xl">Achternaam</label>
          <br>
          <input class="bg-gray-200 rounded w-full text-2xl" id="achternaamInput" placeholder="Achternaam"/>
        </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-200 rounded p-4 w-full ">
        <label class="text-gray-500 text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full" placeholder="E-mail"/>
        </section>
      </div>
      <div class="p-4 flex justify-between items-center">
        <button class="text-3xl rounded p-2 border-gray-300 border-2" @click="showRegistration=!showRegistration">Terug</button>
        <button class="text-3xl bg-black text-white rounded p-2 border-gray-300 border-2" @click="showRegResult=!showRegResult">Toevoegen</button>
      </div>
    </div>
  </div>
  </div>


    <div v-if="showRegResult">
    <div class="fixed justify-center items-center inset-0 z-50 flex">
      <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">

      </div>
    </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MentorList",
  data () {
    return {
      showRegistration: false,
      showRegResult: false
    }
  }
}
</script>
