<template>
  <renderless-laravel-vue-pagination
    :data="data"
    :limit="limit"
    @pagination-change-page="onPaginationChangePage"
  >
    <div
      slot-scope="{
        computed,
        pageButtonEvents,
        nextButtonEvents,
        prevButtonEvents,
      }"
      class="
        border-t border-gray-200
        px-4
        flex
        items-center
        justify-between
        sm:px-0
      "
    >
      <div class="w-0 flex-1 flex">
        <a
          v-if="computed.prevPageUrl"
          :class="{ disabled: !computed.prevPageUrl }"
          href="#"
          class="
            -mt-px
            border-t-2 border-transparent
            pt-4
            pr-1
            inline-flex
            items-center
            text-sm
            leading-5
            font-medium
            text-gray-500
            hover:text-gray-700 hover:border-gray-300
            focus:outline-none focus:text-gray-700 focus:border-gray-400
            transition
            ease-in-out
            duration-150
          "
          v-on="prevButtonEvents"
        >
          <svg
            class="mr-3 h-5 w-5 text-gray-400"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              fill-rule="evenodd"
              d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
              clip-rule="evenodd"
            />
          </svg>
          Previous
        </a>
      </div>
      <ul class="hidden md:flex">
        <li
          v-for="(page, key) in computed.pageRange"
          :key="key"
          :class="{ 'text-gray-900': page == computed.currentPage }"
        >
          <a
            href="#"
            class="
              -mt-px
              border-t-2 border-transparent
              pt-4
              px-4
              inline-flex
              items-center
              text-sm
              leading-5
              font-medium
              text-gray-500
              hover:text-gray-700 hover:border-gray-300
              focus:outline-none focus:text-gray-700 focus:border-gray-400
              transition
              ease-in-out
              duration-150
            "
            v-on="pageButtonEvents(page)"
          >
            {{ page }}
          </a>
        </li>
      </ul>
      <div class="w-0 flex-1 flex justify-end">
        <a
          v-if="computed.nextPageUrl"
          :class="{ disabled: !computed.nextPageUrl }"
          href="#"
          class="
            -mt-px
            border-t-2 border-transparent
            pt-4
            pl-1
            inline-flex
            items-center
            text-sm
            leading-5
            font-medium
            text-gray-500
            hover:text-gray-700 hover:border-gray-300
            focus:outline-none focus:text-gray-700 focus:border-gray-400
            transition
            ease-in-out
            duration-150
          "
          v-on="nextButtonEvents"
        >
          Next
          <svg
            class="ml-3 h-5 w-5 text-gray-400"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              fill-rule="evenodd"
              d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </div>
    </div>
  </renderless-laravel-vue-pagination>
</template>

<script>
import RenderlessLaravelVuePagination from './RenderlessLaravelVuePagination'
export default {
  name: 'Pagination',
  components: { RenderlessLaravelVuePagination },
  props: {
    data: {
      default: () => {},
    },
    limit: {
      type: Number,
      default: 0,
    },
  },

  methods: {
    onPaginationChangePage(page) {
      this.$emit('pagination-change-page', page)
    },
  },
}
</script>

<style scoped></style>
