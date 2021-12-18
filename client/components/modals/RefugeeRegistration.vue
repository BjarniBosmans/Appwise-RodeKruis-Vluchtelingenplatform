<template>
  <div class="fixed justify-center items-center inset-0 z-50 flex">
   <form @submit.prevent="addRefugee">
    <div class="flex flex-col max-w-5xl rounded-lg shadow-lg bg-white">
      <div class="p-8">
        <div class="flex justify-center items-center">
          <h1 class="text-5xl">
      <span class="text-accent-secondary">
       {{ $t('Add')}}
      </span>
            {{ $t('refugee')}}
          </h1>
        </div>
      </div>
      <div class="p-8">
        <div class="justify-center">
          <section class="bg-gray-secondary rounded p-4 w-5/12 float-left">
            <label class="text-2xl">{{ $t('Firstname')}}</label>
            <br>
            <input class="bg-gray-secondary rounded w-full text-2xl p-2"  v-model="form.firstname" id="firstname-input"/>
          </section>
          <section class="bg-gray-secondary rounded p-4 w-5/12  float-right">
            <label class="text-2xl">{{ $t('Lastname')}}</label>
            <br>
            <input class="bg-gray-secondary rounded w-full text-2xl p-2"  v-model="form.lastname" id="lastname-input"/>
          </section>
        </div>
        <br><br><br><br><br>
        <section class="bg-gray-secondary rounded p-4 w-full ">
          <label class="text-2xl">E-mail</label>
          <br>
          <input class="bg-gray-secondary rounded text-2xl w-full p-2"  v-model="form.email" id="email-input"/>
        </section>
        <br>
        <section class="bg-gray-secondary rounded p-4 w-full ">
          <label class="text-2xl">{{ $t('Country of origin')}}</label>
          <br>
          <input class="bg-gray-secondary rounded text-2xl w-full p-2"  v-model="form.country_of_origin" id="country-input"/>
        </section>
      </div>
      <div class="p-4 flex justify-between items-center">
        <Button class="text-3xl" @click="$emit('closeReg')">{{ $t('Back')}}</Button>
        <Button class="text-3xl" type="submit" @click="showRegResult=true">{{ $t('Add')}}</Button>
      </div>
    </div>
   </form>
    <RefugeeRegistrationConfirm class="bg-black bg-opacity-25" :refugee="created_user" v-if="created_user" @closeRegConfirm="created_user=null"/>
  </div>
</template>

<script>
import RefugeeRegistrationConfirm from "../modals/RefugeeRegistrationConfirm";
import Button from "../util/Button";
export default {
  name: "RefugeeRegistration",
  components:{
    Button,
    RefugeeRegistrationConfirm
  },
  middleware: 'auth',
  data:() => ({
      showRegResult: false,
    form: {
      firstname: '',
      lastname: '',
      email: '',
      role: 'refugee',
      country_of_origin: '',
    },
    created_user:null
    }),

  methods:{
    async addRefugee(){
      await this.$axios.post('api/refugees/add', this.form)
      .then(response => {
        this.created_user= response.data.user
      })
        .then(() => {
          this.$emit("addedRefugee", this.created_user)
        })
      .catch(error => console.log(error));
    }
  }


}
</script>
