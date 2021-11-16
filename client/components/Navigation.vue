<template>
  <div class="flex-1 flex flex-col">
    <nav class="p-4 flex justify-between bg-white border-b-2">

      <!-- links -->
      <ul class="flex items-center">
        <li class="w-40">
          <img
            class="h-full w-full mx-auto object-contain"
            src="@/assets/rodekruis.png"
            alt="logo" />
        </li>
        <li>
          <input class="w-48 border-2 rounded-full bg-gray-200 mt-4 p-4 text-xl" placeholder="Zoeken..."/>
        </li>
      </ul>

      <!-- rechts  -->
      <div class="relative flex items-center bg-gray-100 right-12 rounded h-24 top-10">
        <button @click="showMenu=!showMenu" class="flex items-center p-4" id="menu-btn">
          <img alt="picture" class="w-16 rounded-full" src="@/assets/appwiseletter.jpg"/>
          <label class="text-xl m-2">Naam</label>
        </button>
        <div v-if="showMenu" class="absolute bottom-0 right-6 bg-gray-100 transform translate-y-full z-20" id="dropdown">
          <a href="#" class="block px-4 py-2 text-xl hover:bg-blue-200">Profiel</a>
          <NuxtLink to="/login" class="block px-4 py-2 text-xl hover:bg-blue-200">Uitloggen</NuxtLink>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navigation",
  data () {
    return {
      showMenu: false
    }
  }
}
</script>
