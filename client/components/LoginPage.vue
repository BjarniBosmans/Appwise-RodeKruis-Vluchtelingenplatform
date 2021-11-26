<template>
  <div class="justify-center items-center inset-0 flex">
    <div class="flex flex-col max-w-6xl rounded-lg shadow-lg bg-white border-gray-300 border-4">
      <div class="pl-32 pr-32 p-4">
        <img class="justify-center w-full h-72" src="@/assets/Flag_of_the_Red_Cross.svg.png">
        <br>
        <h1 class="text-4xl justify-center items-center w-full flex">{{ $t('Login') }}</h1>
        <br>
        <form method="post" @submit.prevent="loginRefugee">
    <div class="p-4">
      <label class="text-xl p-2">{{ $t('Unique code')}}</label>
      <input class="text-xl p-2 rounded w-full border-gray-300 border-2" v-model="form.unique_code"/>
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
  name: "LoginPage",
  middleware: 'auth',
  data(){
    return{
      form:{
        unique_code: '',
        password: ''
      }}},
  methods:{
    async loginRefugee(){
      await this.$auth.loginWith('laravelSanctum', {
        data: {
          unique_code: this.form.unique_code,
          password: this.form.password
        }
      })
        .then(response => console.log(response))
        .catch(error => console.log(error))
    }
  }

}
</script>
