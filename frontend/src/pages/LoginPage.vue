<template>
 <div>
   <h1>Register</h1>
   <RegisterForm/>
 </div>
</template>

<script>
import RegisterForm from '../forms/RegisterForm'
export default {
  name: 'LoginPage',
  components: {RegisterForm},
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<style scoped>

</style>
