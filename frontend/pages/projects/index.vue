<template>
  <div>
    <modal :is-open="open" @close="modalClose" />
    <div class="bg-gray-50 py-5 rounded shadow-sm mb-2 px-6 items-center">
      <div class="flex justify-between py-2 mb-1">
        <div>Project List</div>
        <div>
          <button
            class="bg-indigo-700 py-2 px-6 rounded text-white"
            @click="openModal"
          >
            New Project
          </button>
        </div>
      </div>
      <div class="flex space-x-4">
        <div class="w-2/3 flex space-x-4">
          <div class="w-1/2">
            <span class="text-gray-800 text-sm mb-1 inline-block">User By</span>
            <select
              id="name"
              name="name"
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
            >
              <option>No Filters</option>
            </select>
          </div>
          <div class="w-1/2">
            <span class="text-gray-800 text-sm mb-1 inline-block"
              >From date</span
            >
            <div
              class="
                relative
                text-gray-500
                focus-within:text-purple-600
                dark:focus-within:text-purple-400
              "
            >
              <input
                v-model="filter.from_date"
                type="date"
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
                placeholder=""
              />
            </div>
          </div>
          <div class="w-1/2">
            <span class="text-gray-800 text-sm mb-1 inline-block">To Date</span>
            <div
              class="
                relative
                text-gray-500
                focus-within:text-purple-600
                dark:focus-within:text-purple-400
              "
            >
              <input
                v-model="filter.to_date"
                type="date"
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
                placeholder="Jane Doe"
              />
            </div>
          </div>
        </div>
        <div class="flex-1">
          <span class="text-gray-800 text-sm mb-1 inline-block">Search</span>
          <input
            v-model="keywords"
            type="text"
            class="
              appearance-none
              block
              w-full
              px-3
              py-2
              border border-gray-300
              rounded-md
              placeholder-gray-400
              focus:outline-none focus:shadow-outline-blue focus:border-blue-300
              transition
              duration-150
              ease-in-out
              sm:text-sm sm:leading-5
            "
            placeholder="Search project"
          />
        </div>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Project Tittle
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Creator
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Status
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Start date
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    deadline
                  </th>
                  <th
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    created_at
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="project in projects" :key="project.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ project.title }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ project.creator.name }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold
                        rounded-full
                      "
                      :class="[
                        project.status === 'Not Start'
                          ? 'bg-red-100 text-red-800'
                          : 'bg-green-100 text-green-800',
                      ]"
                    >
                      {{ project.status }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ project.start_date }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ project.deadline }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ project.created_at }}
                  </td>
                  <td
                    class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-right text-sm
                      font-medium
                    "
                  >
                    <a href="#" class="text-indigo-600 hover:text-indigo-900"
                      >Edit</a
                    >
                  </td>
                </tr>
              </tbody>
            </table>
            <Pagination
              :data="data"
              :limit="limit"
              @pagination-change-page="getResourceResults"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Pagination from '../../components/Pagination'
import Modal from '../../components/Modal'
export default {
  components: { Modal, Pagination },
  data() {
    return {
      limit: 10,
      page: 1,
      open: false,
      projects: [],
      data: [],
      filter: {
        from_date: null,
        to_date: null,
      },
    }
  },
  head: {
    title: 'Dashboard',
  },
  watch: {
    keywords(after, before) {
      this.getProjects()
    },
    filter: {
      handler() {
        this.filterByDate()
      },
      deep: true,
    },
  },
  created() {
    this.getProjects()
  },
  methods: {
    async getProjects() {
      await this.$axios
        .$get(`/projects?search=${this.keywords}&page=${this.page}`)
        .then((res) => {
          this.projects = res.data
          this.data = res
        })
    },
    async getResourceResults(page) {
      this.page = page
      await this.$axios.$get(`/projects?page=${page}`).then((res) => {
        this.projects = res.data
        this.data = res
      })
    },
    async filterByDate() {
      if (this.filter.from_date && this.filter.to_date) {
        await this.$axios
          .$get(
            `/projects?from_date=${this.filter.from_date}&to_date=${this.filter.to_date}&page=${this.page}`
          )
          .then((res) => {
            this.projects = res.data
            this.data = res
          })
      }
    },
    openModal() {
      this.open = true
    },
    modalClose() {
      this.open = false
    },
  },
}
</script>

<style scoped></style>
