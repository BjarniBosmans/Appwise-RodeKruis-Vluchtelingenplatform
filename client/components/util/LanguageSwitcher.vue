<template>
  <div>
    <nuxt-link class="text-xl bg-gray-primary rounded-lg hover:bg-dark-primary hover:text-white p-4" v-for="locale in availableLocales"
                       :key="locale.code"
                       :to="switchLocalePath(locale.code)">{{locale.image}}{{ locale.name }}
    </nuxt-link>
<!--    <select class="p-4 flex justify-content items-center bg-gray-secondary rounded-lg">-->
<!--    <option class="text-xl">{{ $t('Please select a language') }}</option>-->
<!--    <option class="text-xl" v-for="locale in availableLocales"-->
<!--            ><nuxt-link class="flex justify-center items-center" :key="locale.code" :to="switchLocalePath(locale.code)">{{ locale.name }}</nuxt-link></option>-->
<!--    </select>-->
    </div>
</template>
<script>
export default {
  name: "LanguageSwitcher",
  computed: {
    availableLocales () {
      return this.$i18n.locales.filter(i => i.code !== this.$i18n.locale)
    }
  }
}
</script>
