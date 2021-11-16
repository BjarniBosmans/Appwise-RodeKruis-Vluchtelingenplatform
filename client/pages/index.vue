<template>
  <div>
    <Navigation/>
   <img class="-z-10 absolute w-full h-full" src="@/assets/rode_lijn.svg"/>
    <div class="max-w-pagewidth mx-auto">
    <mentor-page />
    <mentor-list/>
    </div>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import MentorPage from "../components/MentorPage";
import MentorList from "../components/MentorList";
export default {
  name: 'home',
  components: {MentorList, MentorPage, Navigation}
}
</script>
