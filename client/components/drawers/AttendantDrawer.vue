<template>
<div>
  <button></button>
  <img src="assets/Portrait_Placeholder.png"/>
  <section>
    <p>Personal information:</p>
    <label class="text-">{{ $t('Full name')}}</label>
    <p class="text-dark-primary">Name</p>
    <br>
    <label>Email</label>
    <p class="text-dark-primary">Email</p>

    <section>
      <p>Assigned refugees</p>
      <button></button>
    </section>
  </section>
</div>
</template>

<script>
export default {
  name: "AttendantDrawer"
}
</script>
