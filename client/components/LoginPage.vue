<template>
  <div class="justify-center items-center inset-0 flex">
    <div class="flex flex-col max-w-6xl rounded-lg shadow-lg bg-white border-gray-300 border-4">
      <div class="pl-32 pr-32 p-4">
        <img class="justify-center w-full h-72" src="@/assets/Flag_of_the_Red_Cross.svg.png">
        <br>
        <h1 class="text-4xl justify-center items-center w-full flex">Login</h1>
        <br>
          <div class="flex justify-center m-4">
            <button class="text-2xl bg-gray-300 rounded p-4 focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="showEmployee=true" autofocus>Attendant</button>
            <button class="text-2xl bg-gray-300 rounded p-4 focus:text-white focus:bg-black hover:text-white hover:bg-black" @click="showEmployee=false">Refugee</button>
          </div>
        <br>
        <hr class="shadow">
    <div v-if="showEmployee" class="p-4">
    <label class="text-xl p-2">E-mail</label>
    <input class="text-xl p-2 rounded w-full border-gray-300 border-2"/>
    <br><br>
    <label class="text-xl p-2">Password</label>
    <input class="text-xl p-2 rounded w-full border-gray-300 border-2" type="password"/>
    </div>
    <div v-if="!showEmployee" class="p-4">
      <label class="text-xl p-2">Unique code</label>
      <input class="text-xl p-2 rounded w-full border-gray-300 border-2"/>
      <br><br>
      <label class="text-xl p-2">Password</label>
      <input class="text-xl p-2 rounded w-full border-gray-300 border-2" type="password"/>
    </div>
        <nuxt-link to="/">
    <button class="text-2xl bg-gray-300 w-full rounded p-4 justify-center flex hover:text-white hover:bg-black">Login</button>
        </nuxt-link>
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

