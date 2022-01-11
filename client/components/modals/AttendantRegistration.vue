<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
    <form @submit.prevent="addAttendant">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
      <div class="px-44 py-8">
        <div class="flex justify-center items-center">
          <h1 class="text-5xl">
      <span class="text-accent-secondary">
       {{ $t('Add')}}
      </span>
            {{ $t('attendant')}}
          </h1>
        </div>
      </div>
      <div class="p-8">
        <div class="justify-center">
          <section class="bg-gray-secondary rounded p-4 w-5/12 float-left">
            <label class="text-2xl">{{ $t('Firstname')}}</label>
            <br>
            <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.firstname" id="firstname-input"/>
          </section>
          <section class="bg-gray-secondary rounded p-4 w-5/12  float-right">
            <label class="text-2xl">{{ $t('Lastname')}}</label>
            <br>
            <input class="bg-gray-secondary rounded w-full text-2xl p-2" v-model="form.lastname" id="lastname-input"/>
          </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-secondary rounded p-4 w-full ">
          <label class="text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-secondary rounded text-2xl w-full p-2" v-model="form.email" id="email-input"/>
        </section>
        <br>
        <section class="bg-gray-secondary rounded p-4 w-full ">
          <label class="text-2xl">{{ $t('Password')}}</label>
          <br>
          <input class="bg-gray-secondary rounded text-2xl w-full p-2" id="password-input" v-model="form.password" type="password"/>
        </section>
        <br>
      </div>
      <p class="text-xl text-accent-primary w-full p-4" v-if="hasError">{{ $t('Please fill in everything') }}</p>
      <div class="p-4 flex justify-between items-center">
        <Button class="text-3xl" @click="$emit('closeRegAttendant')">{{ $t('Back')}}</Button>
        <Button class="text-3xl " @click="showRegResult=true">{{ $t('Add')}}</Button>
      </div>
    </div>
    </form>
    <AttendantRegistrationConfirm class="" :attendant="created_user" v-if="created_user" @closeRegConfirmAttendant="created_user=null"/>
  </div>
</template>

<script>
import AttendantRegistrationConfirm from "./AttendantRegistrationConfirm";
import Button from "../util/Button";
export default {
  name: "AttendantRegistration",
  components: {Button, AttendantRegistrationConfirm},
  middleware: 'auth',
  data:() => ({
    showRegResult: false,
    hasError: false,
    form: {
      firstname: '',
      lastname: '',
      email: '',
      role: 'attendant',
      password: ''
    },
    created_user:null
  }),
  watch: {
    "form.firstname": function (firstname){
      this.hasError= !firstname
    },
    'form.lastname': function (lastname){
      this.hasError= !lastname
    }
    ,
    'form.email': function (email){
      this.hasError= !email
    },
    'form.password': function (password){
      this.hasError= !password
    }
    },
  methods:{
    async addAttendant(){
      await this.$axios.post('api/attendants/add', this.form)
        .then(response => {
          this.created_user= response.data.user
        })
        .then(() => {
          this.$emit("addedAttendant", this.created_user)
          this.form.firstname=''
          this.form.lastname=''
          this.form.email=''
          this.form.password=''
        })
        .catch(error => console.log(error));
    }
  }
}
</script>

