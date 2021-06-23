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

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form method="POST" @submit.prevent="userLogin">
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
                v-model="credentials.email"
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
                v-model="credentials.password"
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
            </div>
          </div>
          <div>
            <p class="mt-8">
              Need an account?
              <nuxt-link
                to="/registrations"
                class="text-blue-500 hover:text-blue-700 font-semibold"
                >Create an account</nuxt-link
              >
            </p>
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
export default {
  auth: 'guest',
  layout(context) {
    return 'auth'
  },
  data() {
    return {
      credentials: {
        email: '',
        password: '',
      },
    }
  },
  head: {
    title: 'Login Page',
  },
  mounted() {
    if (this.$auth.loggedIn) {
      this.$router.push({ path: '/dashboard' })
    }
  },
  methods: {
    async userLogin() {
      try {
        await this.$auth
          .loginWith('local', { data: this.credentials })
          .then((res) => {
            this.$router.push({ path: '/dashboard' })
          })
      } catch (err) {
        this.error = err.response.data.error
      }
    },
  },
}
</script>
