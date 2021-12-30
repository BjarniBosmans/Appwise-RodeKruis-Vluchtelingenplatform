<template>
  <div>
  <div class="grid grid-cols-1 h-screen md:grid-cols-2">
    <section class="h-full flex flex-col justify-center items-center">
      <LoginPageBeheer class="h-full"/>
    </section>
    <section class="h-full flex flex-col hidden md:block">
    <img class="object-cover h-full" src="@/assets/rodekruisimg.png"/>
    </section>
  </div>
  </div>
</template>

<script>
import LanguageSwitcher from "../components/util/LanguageSwitcher";
import LoginPageBeheer from "../components/LoginPageBeheer";
export default {
  transition: {
    beforeEnter() {
      this.$i18n.finalizePendingLocaleChange()
    }
  },
  name: "loginBeheer",
  components: {LoginPageBeheer, LanguageSwitcher}
}
</script>
