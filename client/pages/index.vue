<template>
  <div>
    <Navigation/>
<!--    <img class="left-0 right-0 bottom-0 top-0 -z-10 absolute" src="@/assets/Stroke1.svg"/>-->
    <mentor-page/>
    <mentor-list/>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import MentorPage from "../components/MentorPage";
import MentorList from "../components/MentorList";
export default {
  components: {MentorList, MentorPage, Navigation}
}
</script>
