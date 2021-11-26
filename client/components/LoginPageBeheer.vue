<template>
  <div class="justify-center items-center inset-0 flex">
    <div class="flex flex-col max-w-6xl rounded-lg shadow-lg bg-white border-gray-300 border-4">
      <div class="pl-32 pr-32 p-4">
        <img class="justify-center w-full h-72" src="@/assets/Flag_of_the_Red_Cross.svg.png">
        <br>
        <h1 class="text-4xl justify-center items-center w-full flex">{{ $t('Login') }}</h1>
        <br>
        <form method="post" @submit.prevent="login">
        <div class="p-4">
          <label class="text-xl p-2">E-mail</label>
          <input class="text-xl p-2 rounded w-full border-gray-300 border-2" v-model="form.email"/>
          <br><br>
          <label class="text-xl p-2">{{ $t('Password')}}</label>
          <input class="text-xl p-2 rounded w-full border-gray-300 border-2" type="password" v-model="form.password"/>
        </div>
          <button class="text-2xl bg-gray-tertiary w-full rounded p-4 justify-center flex hover:text-white hover:bg-black">{{ $t('Login') }}</button>
        </form>


      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginPageBeheer",
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
