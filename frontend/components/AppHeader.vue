<template>
  <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
    <button
      class="
        px-4
        border-r border-gray-200
        text-gray-500
        focus:outline-none focus:bg-gray-100 focus:text-gray-600
        md:hidden
      "
      aria-label="Open sidebar"
    >
      <svg
        class="h-6 w-6"
        stroke="currentColor"
        fill="none"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h7"
        />
      </svg>
    </button>
    <div class="flex-1 px-4 flex justify-between">
      <div class="flex-1 flex">
        <div class="w-full flex md:ml-0">
          <label for="search_field" class="sr-only">Search</label>
          <div class="relative w-full text-gray-400 focus-within:text-gray-600">
            <div
              class="
                absolute
                inset-y-0
                left-0
                flex
                items-center
                pointer-events-none
              "
            >
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                />
              </svg>
            </div>
            <input
              id="search_field"
              class="
                block
                w-full
                h-full
                pl-8
                pr-3
                py-2
                rounded-md
                text-gray-900
                placeholder-gray-500
                focus:outline-none focus:placeholder-gray-400
                sm:text-sm
              "
              placeholder="Search"
              type="search"
            />
          </div>
        </div>
      </div>
      <div class="ml-4 flex items-center md:ml-6">
        <!-- Profile dropdown -->
        <div class="ml-3 relative">
          <div>
            <button
              id="user-menu"
              class="
                max-w-xs
                flex
                items-center
                text-sm
                rounded-full
                focus:outline-none focus:shadow-outline
              "
              aria-label="User menu"
              aria-haspopup="true"
              @click.prevent="logout"
            >
              Logout
            </button>
          </div>
          <!--
          Profile dropdown panel, show/hide based on dropdown state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        --></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AppHeader',
  methods: {
    async logout() {
      try {
        await this.$auth.logout().then((res) => {
          this.$router.push({ path: '/' })
        })
      } catch (err) {
        this.error = err.response.data.error
      }
    },
  },
}
</script>

<style scoped></style>
