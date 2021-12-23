<template>
  <div class="flex-1 flex flex-col">
    <nav class="p-4 flex items-center justify-between bg-white">
      <!-- links -->
      <ul class="flex items-center">
        <li class="w-28">
          <img
            class="h-full w-full mx-auto object-contain"
            src="@/assets/Flag_of_the_Red_Cross.svg.png"
            alt="logo" />
        </li>
        <li>
          <input v-if="$auth.user.role!=='refugee'" class=" md:w-96 md:block rounded-lg bg-gray-primary outline-none p-3 text-xl hidden border border-transparent border-solid focus:border-accent-secondary duration-200" :placeholder="$t('Search')"/>
        </li>
      </ul>

      <!-- rechts  -->
      <div>
        <div class="relative flex items-center bg-gray-secondary right-0 rounded-xl">
          <button @click="showMenu=!showMenu" class="flex items-center py-3 px-3" id="menu-btn">
            <img alt="picture" class="w-8 h-8 rounded-full" src="@/assets/Portrait_Placeholder.png"/>
            <label class="text-xl ml-2.5 mr-6" v-if="$auth.user">{{ $auth.user.firstname }}</label>
            <chevron-right class="h-3.5 w-3.5"/>
          </button>
          <div v-if="showMenu" class="rounded w-full absolute md:bottom-0 right-0 bg-gray-secondary transform translate-y-full z-20" id="dropdown">
            <button @click.prevent="logout"  class="block px-4 w-full py-2 text-xl hover:bg-blue-200">{{ $t('Logout')}}</button>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import ChevronRight from "./icons/chevron-down";
export default {
  name: "Navigation",
  components: {ChevronRight},
  data () {
    return {
      showMenu: false
    }
  },
  methods:{
    logout(){
      this.$auth.logout().then(this.$router.push('/login'))
    }
  }
}
</script>
