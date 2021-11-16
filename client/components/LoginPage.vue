<template>
  <div class="fixed justify-center items-center inset-0 flex">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white border-red-600 border-4">
      <div class="p-20">
        <img class="justify-center w-full h-1/12 p-4" src="@/assets/Flag_of_the_Red_Cross.svg.png">
          <div class="flex justify-between items-center m-4">
            <h1 class="text-6xl text-red-600 m-2">Login</h1>
            <button class="text-4xl bg-red-600 text-white rounded p-4 " @click="showEmployee=true">Begeleider</button>
            <button class="text-4xl bg-red-600 text-white rounded p-4 " @click="showEmployee=false">Vluchteling</button>
          </div>
        <hr class="shadow">
    <div v-if="showEmployee" class="m-4 p-4">
    <label class="text-4xl p-2">E-mail</label>
    <input class="text-4xl p-2 rounded w-full border-red-600 border-2"/>
    <br><br>
    <label class="text-4xl p-2">Wachtwoord</label>
    <input class="text-4xl p-2 rounded w-full border-red-600 border-2"/>
    </div>
    <div v-if="!showEmployee" class="m-4 p-4">
      <label class="text-4xl p-2">Unieke code</label>
      <input class="text-4xl p-2 rounded w-full border-red-600 border-2"/>
      <br><br>
      <label class="text-4xl p-2">Wachtwoord</label>
      <input class="text-4xl p-2 rounded w-full border-red-600 border-2"/>
    </div>
    <button class="text-4xl bg-red-600 text-white rounded p-4 m-4">Login</button>
      </div>
</div>
  </div>


</template>

<script>
export default {
  name: "LoginPage",
  data () {
    return {
      showEmployee: true
    }
  }
}
</script>

