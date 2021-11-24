<template>
  <div>
    <language-switcher/>
<login-page class="bg-gray-300 bg-opacity-50"/>
  </div>
</template>

<script>
import LoginPage from "../components/LoginPage";
import LanguageSwitcher from "../components/util/LanguageSwitcher";
export default {
  name: "login",
  components: {LanguageSwitcher, LoginPage}
}
</script>

