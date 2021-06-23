export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,
  loading: {
    color: 'blue',
    height: '5px',
  },
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'pms_frontend',
    htmlAttrs: {
      lang: 'en',
    },
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: ''},
    ],
    link: [{rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],
  router: {
    middleware: ['auth'],
  },
  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
  ],

  auth: {
    redirect: {
      login: '/',
      logout: '/',
      home: '/dashboard',
    },
    strategies: {
      local: {
        token: {
          property: 'token',
          required: true,
          type: 'Bearer',
        },
        user: {
          property: 'data',
          autoFetch: true,
        },
        endpoints: {
          login: {
            url: process.env.BASE_API_URL + '/login',
            method: 'post',
          },
          logout: {
            url: process.env.BASE_API_URL + '/logout',
            method: 'post',
          },
          user: {
            url: process.env.BASE_API_URL + '/user',
            method: 'get',
          },
        },
      },
    },
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: process.env.BASE_API_URL,
    common: {
      Accept: 'application/json',
    },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
}
