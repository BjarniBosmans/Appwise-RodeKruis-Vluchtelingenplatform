<template>
  <div>
    <language-switcher/>
<login-page/>
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

