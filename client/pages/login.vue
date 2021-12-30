<template>
  <div>
    <div class="grid grid-cols-1 h-screen md:grid-cols-2">
      <section class="h-full flex flex-col justify-center items-center">
        <LoginPage class="h-full"/>
      </section>
      <section class="h-full flex flex-col hidden md:block">
        <img class="object-cover h-full" src="@/assets/rodekruisimg.png"/>
      </section>
    </div>
  </div>
</template>

<script>
import LoginPage from "../components/LoginPage";
import LanguageSwitcher from "../components/util/LanguageSwitcher";
export default {
  transition: {
    beforeEnter() {
      this.$i18n.finalizePendingLocaleChange()
    }
  },
  name: "login",
  components: {LanguageSwitcher, LoginPage}
}
</script>

