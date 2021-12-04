<template>
  <div>
    <Navigation/>
   <img class="-z-10 absolute w-full h-full" src="@/assets/rode_lijn.svg"/>
    <div class="max-w-7xl mx-auto" >
    <MainPage v-if="userIsAdmin || userIsAttendant"/>
    <AttendantList v-if="userIsAttendant"/>
    <AdminList v-if="userIsAdmin"/>
    <RefugeePage v-if="userIsRefugee"/>
    </div>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import MentorPage from "../components/MainPage";
import MentorList from "../components/lists/AttendantList";
import MainPage from "../components/MainPage";
import AttendantList from "../components/lists/AttendantList";
import AdminList from "../components/lists/AdminList";
import RefugeePage from "../components/RefugeePage";
export default{
  name: 'home',
  components: {RefugeePage, AdminList, AttendantList, MainPage, Navigation},
  middleware: 'auth',
  data:() => ({
    userIsAttendant:false,
    userIsAdmin: false,
    userIsRefugee:false
  }),
  mounted() {
    this.checkAttendant()
    this.checkAdmin()
    this.checkRefugee()
  },
  methods:{
    checkAttendant(){
      if(this.$auth.user.role == 'attendant'){
        this.userIsAttendant=true;
      }
    },
    checkAdmin(){
      if(this.$auth.user.role == 'admin'){
        this.userIsAdmin=true;
      }
    },
    checkRefugee(){
      if(this.$auth.user.role == 'refugee'){
        this.userIsRefugee=true;
      }
    }
  }
}
</script>
