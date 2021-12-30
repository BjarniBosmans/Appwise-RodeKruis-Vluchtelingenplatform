<template>
  <div>
    <nuxt-link :class="[
      $i18n.locale === locale.code ? 'bg-dark-primary': 'bg-gray-primary'
    ]" class="rounded-lg hover:bg-dark-primary hover:text-white p-4 block" v-for="locale in availableLocales"
                       :key="locale.code"
                       :to="switchLocalePath(locale.code)">
      <img class="h-8 w-12" :src="images[locale.code]"/>
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
  data(){
    return{
    images:{
      nl:require('~/assets/NL.png'),
      fr:require('~/assets/France.png'),
      de:require('~/assets/germany.png'),
      en:require('~/assets/UK.png')
    }
    }
  },
  computed: {
    availableLocales () {
      return this.$i18n.locales
    }
  }
}
</script>
