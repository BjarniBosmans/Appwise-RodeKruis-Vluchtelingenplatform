<template>
  <div class="justify-center relative items-center flex flex-col w-full">
    <LanguageSwitcher class="absolute  right-8 top-4 "/>
 <img class="absolute object-contain w-40 h-40 top-20 left-1/2 transform -translate-x-1/2" src="@/assets/Flag_of_the_Red_Cross.svg.png">
    <div class="w-full px-16 max-w-2xl absolute">
      <div>
        <h1 class="text-dark-primary text-4xl font-bold">{{ $t('Welcome') }}</h1>
         <p>{{ $t('Please sign in.') }}</p>
      </div>
      <br>
      <form method="post" @submit.prevent="login" class="flex flex-col">
      <div class="bg-gray-secondary rounded p-4">
        <label class="text-dark-primary">Email</label>
        <br>
      <input class="bg-gray-secondary w-full text-2xl p-2" type="email" v-model="form.email"/>
      </div>
        <br>
        <div class="bg-gray-secondary rounded p-4">
          <label class="text-dark-primary">{{ $t('Password') }}</label>
          <br>
      <input class="bg-gray-secondary w-full text-2xl p-2" type="password" v-model="form.password"/>
        </div>
        <br>
      <button class="justify-center text-2xl px-6 py-4 rounded-lg bg-accent-secondary text-white flex items-center
  hover:bg-dark-primary hover:text-white duration-200">{{ $t('Login') }}</button>
      </form>
    </div>
  </div>
</template>

<script>
import Button from "./util/Button";
import LanguageSwitcher from "./util/LanguageSwitcher";
export default {
  name: "LoginPageBeheer",
  components: {LanguageSwitcher,Button},
  middleware: 'auth',
  data(){
    return{
  form:{
        email: '',
        password: ''
  }}},
  methods:{
  async login(){
     await this.$auth.loginWith('laravelSanctum', {
       data: {
         email: this.form.email,
         password: this.form.password
       }
      })
      .then(response => console.log(response))
      .catch(error => console.log(error))
    }
  }
}
</script>
