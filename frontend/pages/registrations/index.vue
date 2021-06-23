<template>
  <div
    class="
      min-h-screen
      bg-gray-50
      flex flex-col
      justify-center
      py-12
      sm:px-6
      lg:px-8
    "
  >
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img
        class="mx-auto h-12 w-auto"
        src="https://mycdn.gotipath.com/wp-content/uploads/2021/04/gotipath-logo-web.png"
        alt="Workflow"
      />
      <h2
        class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900"
      >
        Sign in to your account
      </h2>
    </div>
    <div
      v-if="errors"
      class="
        bg-red-500
        text-white
        py-2
        px-4
        pr-0
        rounded
        font-bold
        mb-4
        shadow-lg
        flex
        justify-center
        mx-auto
        w-1/2
      "
    >
      <div v-for="(v, k) in errors" :key="k" class="w-1/2">
        <p v-for="error in v" :key="error" class="text-sm">
          {{ error }}
        </p>
      </div>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form @submit.prevent="register">
          <div>
            <label
              for="name"
              class="block text-sm font-medium leading-5 text-gray-700"
            >
              Name
            </label>
            <div class="mt-1 rounded-md shadow-sm">
              <input
                id="name"
                v-model="form.name"
                type="text"
                required
                class="
                  appearance-none
                  block
                  w-full
                  px-3
                  py-2
                  border border-gray-300
                  rounded-md
                  placeholder-gray-400
                  focus:outline-none
                  focus:shadow-outline-blue
                  focus:border-blue-300
                  transition
                  duration-150
                  ease-in-out
                  sm:text-sm sm:leading-5
                "
              />
              <span
                v-if="hasErrors('name')"
                class="text-red-500 mt-1 text-xs"
                >{{ errors.name[0] }}</span
              >
            </div>
          </div>
          <div>
            <label
              for="email"
              class="block text-sm font-medium leading-5 text-gray-700"
            >
              Email address
            </label>
            <div class="mt-1 rounded-md shadow-sm">
              <input
                id="email"
                v-model="form.email"
                type="email"
                required
                class="
                  appearance-none
                  block
                  w-full
                  px-3
                  py-2
                  border border-gray-300
                  rounded-md
                  placeholder-gray-400
                  focus:outline-none
                  focus:shadow-outline-blue
                  focus:border-blue-300
                  transition
                  duration-150
                  ease-in-out
                  sm:text-sm sm:leading-5
                "
              />
              <span
                v-if="hasErrors('email')"
                class="text-red-500 mt-1 text-xs"
                >{{ errors.name[0] }}</span
              >
            </div>
          </div>

          <div class="mt-6">
            <label
              for="password"
              class="block text-sm font-medium leading-5 text-gray-700"
            >
              Password
            </label>
            <div class="mt-1 rounded-md shadow-sm">
              <input
                id="password"
                v-model="form.password"
                type="password"
                required
                class="
                  appearance-none
                  block
                  w-full
                  px-3
                  py-2
                  border border-gray-300
                  rounded-md
                  placeholder-gray-400
                  focus:outline-none
                  focus:shadow-outline-blue
                  focus:border-blue-300
                  transition
                  duration-150
                  ease-in-out
                  sm:text-sm sm:leading-5
                "
              />
              <span
                v-if="hasErrors('password')"
                class="text-red-500 mt-1 text-xs"
                >{{ errors.password[0] }}</span
              >
            </div>
          </div>

          <div class="mt-10">
            <span class="block w-full rounded-md shadow-sm">
              <button
                type="submit"
                class="
                  w-full
                  flex
                  justify-center
                  py-2
                  px-4
                  border border-transparent
                  text-sm
                  font-medium
                  rounded-md
                  text-white
                  bg-indigo-600
                  hover:bg-indigo-500
                  focus:outline-none
                  focus:border-indigo-700
                  focus:shadow-outline-indigo
                  active:bg-indigo-700
                  transition
                  duration-150
                  ease-in-out
                "
              >
                <LoadingSvg :loading="isLoading" />
                Sign in
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingSvg from '../../components/LoadingSvg'

export default {
  components: { LoadingSvg },
  auth: false,
  layout(context) {
    return 'auth'
  },
  data() {
    return {
      isLoading: false,
      errors: null,
      form: {
        name: '',
        email: '',
        password: '',
      },
    }
  },
  head: {
    title: 'Registrations Page',
  },

  methods: {
    async register() {
      this.isLoading = true
      await this.$axios
        .$post('/register', this.form)
        .then((res) => {
          this.isLoading = false
          this.$router.push({ path: '/' })
        })
        .catch((error) => {
          this.isLoading = false
          this.errors = error.response.data.errors
        })
    },
    hasErrors(field) {
      if (this.errors !== null) {
        return field in this.errors
      }
      return false
    },
  },
}
</script>
