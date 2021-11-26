<template>
  <div>
<language-switcher/>
<LoginPageBeheer/>
  </div>
</template>

<script>
import LanguageSwitcher from "../components/util/LanguageSwitcher";
import LoginPageBeheer from "../components/LoginPageBeheer";
export default {
  name: "loginBeheer",
  components: {LoginPageBeheer, LanguageSwitcher}
}
</script>
