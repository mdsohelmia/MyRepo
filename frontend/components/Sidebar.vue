<template>
  <div class="hidden md:flex md:flex-shrink-0">
    <!-- Off-canvas menu for mobile -->
    <div class="md:hidden">
      <div class="fixed inset-0 flex z-40">
        <!--
        Off-canvas menu overlay, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div class="fixed inset-0">
          <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
        <div
          class="
            relative
            flex-1 flex flex-col
            max-w-xs
            w-full
            pt-5
            pb-4
            bg-gray-800
          "
        >
          <div class="absolute top-0 right-0 -mr-14 p-1">
            <button
              class="
                flex
                items-center
                justify-center
                h-12
                w-12
                rounded-full
                focus:outline-none focus:bg-gray-600
              "
              aria-label="Close sidebar"
            >
              <svg
                class="h-6 w-6 text-white"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div class="flex-shrink-0 flex items-center px-4">
            <logo></logo>
          </div>
          <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2">
              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-white
                  bg-gray-900
                  focus:outline-none focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-300
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"
                  />
                </svg>
                Dashboard
              </a>
              <a
                href="#"
                class="
                  mt-1
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-gray-300
                  hover:text-white hover:bg-gray-700
                  focus:outline-none focus:text-white focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-400
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                  />
                </svg>
                Team
              </a>
              <a
                href="#"
                class="
                  mt-1
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-gray-300
                  hover:text-white hover:bg-gray-700
                  focus:outline-none focus:text-white focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-400
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
                  />
                </svg>
                Projects
              </a>
              <a
                href="#"
                class="
                  mt-1
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-gray-300
                  hover:text-white hover:bg-gray-700
                  focus:outline-none focus:text-white focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-400
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                Calendar
              </a>
              <a
                href="#"
                class="
                  mt-1
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-gray-300
                  hover:text-white hover:bg-gray-700
                  focus:outline-none focus:text-white focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-400
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                  />
                </svg>
                Documents
              </a>
              <a
                href="#"
                class="
                  mt-1
                  group
                  flex
                  items-center
                  px-2
                  py-2
                  text-base
                  leading-6
                  font-medium
                  rounded-md
                  text-gray-300
                  hover:text-white hover:bg-gray-700
                  focus:outline-none focus:text-white focus:bg-gray-700
                  transition
                  ease-in-out
                  duration-150
                "
              >
                <svg
                  class="
                    mr-4
                    h-6
                    w-6
                    text-gray-400
                    group-hover:text-gray-300
                    group-focus:text-gray-300
                    transition
                    ease-in-out
                    duration-150
                  "
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                Reports
              </a>
            </nav>
          </div>
        </div>
        <div class="flex-shrink-0 w-14">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64">
        <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
          <logo />
        </div>
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
          <!-- Sidebar component, swap this element with another sidebar if you like -->
          <nav class="flex-1 px-2 py-4 bg-gray-800">
            <nuxt-link
              to="/dashboard"
              class="
                group
                flex
                items-center
                text-gray-300
                px-2
                py-2
                text-sm
                leading-5
                font-medium
                rounded-md
                focus:outline-none focus:bg-gray-700
                transition
                ease-in-out
                duration-150
              "
            >
              <svg
                class="
                  mr-3
                  h-6
                  w-6
                  text-gray-300
                  group-hover:text-gray-300
                  group-focus:text-gray-300
                  transition
                  ease-in-out
                  duration-150
                "
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"
                />
              </svg>
              Dashboard
            </nuxt-link>
            <a
              href="#"
              class="
                mt-1
                group
                flex
                items-center
                px-2
                py-2
                text-sm
                leading-5
                font-medium
                text-gray-300
                rounded-md
                hover:text-white hover:bg-gray-700
                focus:outline-none focus:text-white focus:bg-gray-700
                transition
                ease-in-out
                duration-150
              "
            >
              <svg
                class="
                  mr-3
                  h-6
                  w-6
                  text-gray-400
                  group-hover:text-gray-300
                  group-focus:text-gray-300
                  transition
                  ease-in-out
                  duration-150
                "
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                />
              </svg>
              Team
            </a>
            <nuxt-link
              to="/projects"
              href="#"
              class="
                mt-1
                group
                flex
                items-center
                px-2
                py-2
                text-sm
                leading-5
                font-medium
                text-gray-300
                rounded-md
                hover:text-white hover:bg-gray-700
                focus:outline-none focus:text-white focus:bg-gray-700
                transition
                ease-in-out
                duration-150
              "
            >
              <svg
                class="
                  mr-3
                  h-6
                  w-6
                  text-gray-400
                  group-hover:text-gray-300
                  group-focus:text-gray-300
                  transition
                  ease-in-out
                  duration-150
                "
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
                />
              </svg>
              Projects
            </nuxt-link>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Logo from './Logo'
export default {
  name: 'Sidebar',
  components: { Logo },
}
</script>

<style scoped>
a.nuxt-link-active {
  @apply bg-gray-900 text-white;
}
</style>
