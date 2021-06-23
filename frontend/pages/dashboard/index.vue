<template>
  <div class="bg-white py-10 px-6 rounded">
    <b>Welcome to</b> {{ user.name }}
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: this.$auth.user,
    }
  },
  head: {
    title: 'Dashboard',
  },
}
</script>

<style scoped></style>
