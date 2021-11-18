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
          <input class=" md:w-48 border-2 rounded bg-gray-200 mt-4 p-4 text-xl w-32 h-16 shadow" placeholder="Zoeken..."/>
        </li>
      </ul>

      <!-- rechts  -->
      <div class="mt-14 relative md: mt-0 flex items-center bg-gray-200 right-0 rounded h-16 shadow">
        <button @click="showMenu=!showMenu" class="flex items-center p-4" id="menu-btn">
          <img alt="picture" class="w-16 p-2 rounded-full" src="@/assets/Portrait_Placeholder.png"/>
          <label class="text-xl m-2">Naam</label>
        </button>
        <div v-if="showMenu" class="rounded w-full absolute md:bottom-0 right-0 bg-gray-200 transform translate-y-full z-20" id="dropdown">
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
