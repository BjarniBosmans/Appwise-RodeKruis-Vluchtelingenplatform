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
      <form method="post" @submit.prevent="loginRefugee" class="flex flex-col">
        <div class="bg-gray-secondary rounded p-4">
          <label class="text-dark-primary">Email</label>
          <br>
          <input class="bg-gray-secondary w-full text-2xl p-2" type="email" v-model="form.email"/>
          <br>
          <p class="text-xl text-accent-primary w-full p-2" v-if="hasEmailError">{{ $t('Please fill in a correct email.') }}</p>
        </div>
        <br>
        <div class="bg-gray-secondary rounded p-4">
          <label class="text-dark-primary">{{ $t('Password') }}</label>
          <br>
          <input class="bg-gray-secondary w-full text-2xl p-2" type="password" v-model="form.password"/>
          <br>
          <p class="text-xl text-accent-primary w-full p-2" v-if="hasPasswordError">{{ $t('Please fill in a correct password.') }}</p>
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
  name: "LoginPage",
  components: {LanguageSwitcher, Button},
  middleware: 'auth',
  watch:{
    'form.email': function (email){
      const regex= /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      this.hasEmailError= !regex.test(email)
    },
    'form.password': function (password){
      this.hasPasswordError= !password
    }
  },
  data(){
    return{
      hasEmailError: false,
      hasPasswordError: false,
      form:{
        email: null,
        password: null
      }}},
  methods:{
    async loginRefugee() {
      if(this.hasEmailError || this.hasPasswordError){
        return
      }
        await this.$auth.loginWith('laravelSanctum', {
          data: {
            email: this.form.email,
            password: this.form.password
          }
        })
          .then(response => this.$router.push(this.localePath('/')))
          .catch(error => console.log(error))
      }
  }

}
</script>
