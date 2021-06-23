<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div
    v-show="isOpen"
    class="fixed z-10 inset-0 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
  >
    <div
      class="
        flex
        items-end
        justify-center
        min-h-screen
        pt-4
        px-4
        pb-20
        text-center
        sm:block sm:p-0
      "
    >
      <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <transition
        enter-active-class="ease-out duration-300"
        leave-active-class="ease-in duration-200"
        enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        enter-to-class="opacity-100 translate-y-0 sm:scale-10"
        leave-class="opacity-100 translate-y-0 sm:scale-100"
        leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      >
        <div
          v-show="isOpen"
          class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
          aria-hidden="true"
        ></div>
      </transition>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span
        class="hidden sm:inline-block sm:align-middle sm:h-screen"
        aria-hidden="true"
        >&#8203;</span
      >
      <transition
        enter-active-class="ease-out duration-300"
        leave-active-class="ease-in duration-200"
        enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        enter-to-class="opacity-100 translate-y-0 sm:scale-10"
        leave-class="opacity-100 translate-y-0 sm:scale-100"
        leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      >
        <div
          v-show="isOpen"
          class="
            inline-block
            align-bottom
            bg-white
            rounded-lg
            text-left
            overflow-hidden
            shadow-xl
            transform
            transition-all
            sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full
          "
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 space-y-3">
            <div>
              <label class="block text-sm font-medium leading-5 text-gray-700"
                >Workspace</label
              >
              <div class="mt-1 relative rounded-md shadow-sm">
                <Multiselect
                  v-model="form.workspace_id"
                  :options="workspaces"
                  track-by="name"
                  label="name"
                >
                  <template slot="singleLabel" slot-scope="{ option }">
                    <strong>{{ option.name }}</strong>
                  </template>
                </Multiselect>
              </div>
            </div>
            <div>
              <label
                for="title"
                class="block text-sm font-medium leading-5 text-gray-700"
                >Project Title</label
              >
              <div class="mt-1 relative rounded-md shadow-sm">
                <input
                  id="title"
                  v-model="form.title"
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
                  placeholder="you@example.com"
                />
              </div>
            </div>
            <div>
              <label
                for="start_date"
                class="block text-sm font-medium leading-5 text-gray-700"
                >Start date</label
              >
              <div class="mt-1 relative rounded-md shadow-sm">
                <input
                  id="start_date"
                  v-model="form.start_date"
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
                />
              </div>
            </div>
            <div>
              <label
                for="deadline"
                class="block text-sm font-medium leading-5 text-gray-700"
                >Deadline</label
              >
              <div class="mt-1 relative rounded-md shadow-sm">
                <input
                  id="deadline"
                  v-model="form.deadline"
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
                  placeholder="you@example.com"
                />
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium leading-5 text-gray-700"
                >Team Member</label
              >
              <div class="mt-1 relative rounded-md shadow-sm">
                <Multiselect
                  v-model="form.members"
                  :multiple="true"
                  :options="members"
                  track-by="name"
                  label="name"
                >
                  <template slot="singleLabel" slot-scope="{ option }">
                    <strong>{{ option.name }}</strong>
                  </template>
                </Multiselect>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              type="button"
              class="
                w-full
                inline-flex
                justify-center
                rounded-md
                border border-transparent
                shadow-sm
                px-4
                py-2
                bg-indigo-600
                text-base
                font-medium
                text-white
                hover:bg-indigo-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-red-500
                sm:ml-3 sm:w-auto sm:text-sm
              "
              @click="createProject"
            >
              Create
            </button>
            <button
              type="button"
              class="
                mt-3
                w-full
                inline-flex
                justify-center
                rounded-md
                border border-gray-300
                shadow-sm
                px-4
                py-2
                bg-white
                text-base
                font-medium
                text-gray-700
                hover:bg-gray-50
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-indigo-500
                sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
              "
              @click.prevent="close"
            >
              Cancel
            </button>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  name: 'Modal',
  components: {
    Multiselect,
  },
  props: ['isOpen'],
  data() {
    return {
      members: [],
      workspaces: [],
      errors: [],
      workspace: '',
      form: {
        title: '',
        start_date: '',
        deadline: '',
        members: [],
        workspace_id: '',
      },
    }
  },
  created() {
    this.getMemberUser()
    this.getWorkspaces()
  },
  methods: {
    close() {
      this.$emit('close')
    },
    getMemberUser() {
      this.$axios
        .$get('/members')
        .then((res) => {
          this.members = res.data
        })
        .catch((err) => {
          console.log(err)
        })
    },
    getWorkspaces() {
      this.$axios
        .$get('/workspaces')
        .then((res) => {
          this.workspaces = res.data
        })
        .catch((err) => {
          console.log(err)
        })
    },
    createProject() {
      this.$axios
        .post('/projects', this.form)
        .then((res) => {

        })
        .catch((error) => {
          console.log(error)
        })
    },
  },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
