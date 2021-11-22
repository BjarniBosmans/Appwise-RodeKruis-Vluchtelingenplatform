<template>
  <div class="flex-1 flex flex-col">
    <nav class="p-4 flex justify-between bg-white border-b-2">
        <ul class="p-4 rounded md: mt-0 flex items-center bg-gray-200 h-16 shadow">
          <li class="p-4">
            <nuxt-link :to="switchLocalePath('en')">English</nuxt-link>
          </li>
          <li class="p-4">
            <nuxt-link :to="switchLocalePath('nl')">Nederlands</nuxt-link>
          </li>
          <li class="p-4">
            <nuxt-link :to="switchLocalePath('fr')">Français</nuxt-link>
          </li>
          <li class="p-4">
            <nuxt-link :to="switchLocalePath('de')">Deutsch</nuxt-link>
          </li>
        </ul>
    </nav>
    </div>
</template>

<script>
export default {
  name: "LanguageSwitcher"
}
</script>
