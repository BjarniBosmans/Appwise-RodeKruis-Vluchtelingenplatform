<template>
  <div>
    <Navigation/>
   <img class="-z-10 absolute w-full h-full" src="@/assets/rode_lijn.svg"/>
    <div class="max-w-7xl mx-auto" >
    <MainPage />
<!--<AttendantList/> -->
    <AdminList/>
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
export default{
  name: 'home',
  components: {AdminList, AttendantList, MainPage, Navigation},
  middleware: 'auth',
}
</script>
