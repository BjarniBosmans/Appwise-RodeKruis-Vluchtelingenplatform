<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <form @submit.prevent="addAttendant">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
      <div class="p-8">
        <div class="flex justify-center items-center">
          <h1 class="text-5xl">
      <span style="color: red">
       {{ $t('Add')}}
      </span>
            {{ $t('attendant')}}
          </h1>
        </div>
      </div>
      <div class="p-8">
        <div class="justify-center">
          <section class="bg-gray-200 rounded p-4 w-5/12 float-left">
            <label class="text-2xl">{{ $t('Firstname')}}</label>
            <br>
            <input class="bg-gray-200 rounded w-full text-2xl p-2" v-model="form.firstname" id="firstname-input"/>
          </section>
          <section class="bg-gray-200 rounded p-4 w-5/12  float-right">
            <label class="text-2xl">{{ $t('Lastname')}}</label>
            <br>
            <input class="bg-gray-200 rounded w-full text-2xl p-2" v-model="form.lastname" id="lastname-input"/>
          </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full p-2" v-model="form.email" id="email-input"/>
        </section>
        <br>
        <section class="bg-gray-200 rounded p-4 w-full ">
          <label class="text-2xl">{{ $t('Password')}}</label>
          <br>
          <input class="bg-gray-200 rounded text-2xl w-full p-2" id="password-input" v-model="form.password" type="password"/>
        </section>
        <br>
      </div>
      <div class="p-4 flex justify-between items-center">
        <button class="text-3xl rounded p-2 border-gray-300 border-2" @click="$emit('closeRegAttendant')">{{ $t('Back')}}</button>
        <button class="text-3xl bg-black text-white rounded p-2 border-gray-300 border-2" @click="showRegResult=true">{{ $t('Add')}}</button>
      </div>
    </div>
    </form>
    <AttendantRegistrationConfirm v-if="showRegResult" @closeRegConfirmAttendant="showRegResult=false"/>
  </div>
</template>

<script>
import AttendantRegistrationConfirm from "./AttendantRegistrationConfirm";
export default {
  name: "AttendantRegistration",
  components: {AttendantRegistrationConfirm},
  middleware: 'auth',
  data:() => ({
    showRegResult: false,
    form: {
      firstname: '',
      lastname: '',
      email: '',
      role: 'attendant',
      password: ''
    }
  }),
  methods:{
    async addAttendant(){
      await this.$axios.post('api/attendants/add', this.form)
        .then(response => console.log(response))
        .catch(error => console.log(error));
    }
  }
}
</script>

