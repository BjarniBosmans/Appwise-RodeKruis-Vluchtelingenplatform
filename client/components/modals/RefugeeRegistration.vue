<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <!--<form>-->
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
      <div class="p-8">
        <div class="flex justify-center items-center">
          <h1 class="text-5xl">
      <span style="color: red">
       Toevoegen
      </span>
            vluchteling
          </h1>
        </div>
      </div>
      <div class="p-8">
        <div class="justify-center">
          <section class="bg-gray-200 rounded p-4 w-5/12 float-left">
            <label class="text-2xl">Voornaam</label>
            <br>
            <input class="bg-gray-200 rounded w-full text-2xl p-2" id="firstname-input"/>
          </section>
          <section class="bg-gray-200 rounded p-4 w-5/12  float-right">
            <label class="text-2xl">Achternaam</label>
            <br>
            <input class="bg-gray-200 rounded w-full text-2xl p-2" id="lastname-input"/>
          </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full p-2" id="email-input"/>
        </section>
        <br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-2xl">Wachtwoord</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full p-2" id="password-input" type="password"/>
        </section>
        <br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-2xl">Land van herkomst</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full p-2" id="country-input"/>
        </section>
      </div>
      <div class="p-4 flex justify-between items-center">
        <button class="text-3xl rounded p-2 border-gray-300 border-2" @click="$emit('closeReg')">Terug</button>
        <button class="text-3xl bg-black text-white rounded p-2 border-gray-300 border-2" @click="showRegResult=true">Toevoegen</button>
      </div>
    </div>
    <!--</form>-->
    <RefugeeRegistrationConfirm v-if="showRegResult" @closeRegConfirm="showRegResult=false"/>
  </div>
</template>

<script>
import RefugeeRegistrationConfirm from "../modals/RefugeeRegistrationConfirm";
export default {
  name: "RefugeeRegistration",
  components:{
    RefugeeRegistrationConfirm
  },
  data:() => ({
      showRegResult: false,
    })


}
</script>
