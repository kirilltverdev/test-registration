<template>
  <div>
    <v-form
      ref="form"
      v-model="valid"
      lazy-validation
      class="register-form"
    >
      <v-text-field
        v-model="name"
        :counter="20"
        :rules="nameRules"
        label="Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="E-mail"
        required
      ></v-text-field>

      <v-text-field
        type="password"
        v-model="password"
        :rules="passwordRules"
        label="Password"
        required
      ></v-text-field>

      <v-autocomplete
        v-model="country"
        :items="countries"
        :rules="[v => !!v || 'Country is required']"
        label="Country"
        item-text="name"
        return-object
        required
      >
        <template v-slot:selection="data">
          <v-icon>{{ data.item.flag }}</v-icon>
          <div class="country-name">{{ data.item.name }}</div>
        </template>
        <template v-slot:item="data">
          <v-icon>{{ data.item.flag }}</v-icon>
          <div class="country-name">{{ data.item.name }}</div>
        </template>
      </v-autocomplete>

      <v-text-field
        :prefix="country.idd"
        v-model="phone"
        label="Phone"
        v-mask="'## ###-##-##'"
        :rules="phoneRules"
        :disabled="!country.idd"
      ></v-text-field>

      <v-btn
        :disabled="!valid"
        color="success"
        class="mr-4"
        @click="onSubmit"
      >
        Submit
      </v-btn>
    </v-form>
    <v-alert
      :value="alert.show"
      :color="alert.color"
      dark
      border="top"
      icon="mdi-home"
      transition="scale-transition"
    >
      {{ alert.message }}
    </v-alert>
  </div>
</template>

<script>
import {countriesList} from '../data/countries'
import axios from 'axios'

export default {
  name: 'RegisterForm',
  data: () => ({
    valid: true,
    alert: {
      show: false,
      message: '',
      color: 'green'
    },
    name: '',
    nameRules: [
      v => !!v || 'Name is required',
      v => (v && v.length <= 20) || 'Name must be less than 10 characters'
    ],
    email: '',
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      v => !this.emailExist || 'E-mail already exists'
    ],
    password: '',
    passwordRules: [
      v => !!v || 'Password is required',
      v => (v && v.length >= 8) || 'Password must be greater than 8 characters'
    ],
    country: {},
    phone: '',
    phoneRules: [
      v => !!v || 'Phone is required'
    ],
    countries: countriesList
  }),

  methods: {
    showAlert (data) {
      this.alert = {show: true, ...data}
      setTimeout(() => {
        this.alert = {...this.alert, show: false}
      }, 1000)
    },
    async onSubmit () {
      const formValid = this.$refs.form.validate()
      if (formValid) {
        // Should be vuex action in real project
        const {name, email, country, phone, password} = this

        try {
          await axios.post('http://127.0.0.1/api/register', {name, email, phone, country, password})
          this.showAlert({
            message: 'Success',
            color: 'green'
          })
          this.$refs.form.reset()
          this.country = {}
        } catch (e) {
          this.showAlert({
            message: e.response.data.message,
            color: 'red'
          })
        }
      }
    }
  }
}
</script>

<style scoped>
.country-name {
  margin-left: 10px;
}

.register-form {
  margin: 10%;
}
</style>
