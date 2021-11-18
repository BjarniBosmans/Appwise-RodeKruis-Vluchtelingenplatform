<template>
  <div>
    <Navigation/>
   <img class="-z-10 absolute w-full h-full" src="@/assets/rode_lijn.svg"/>
    <div class="max-w-7xl mx-auto">
    <MainPage />
    <AttendantList/>
    </div>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import MentorPage from "../components/MainPage";
import MentorList from "../components/lists/AttendantList";
import MainPage from "../components/MainPage";
import AttendantList from "../components/lists/AttendantList";
export default {
  name: 'home',
  components: {AttendantList, MainPage, Navigation}
}
</script>
