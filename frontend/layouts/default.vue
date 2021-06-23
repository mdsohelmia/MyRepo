<template>
  <div class="h-screen flex overflow-hidden bg-gray-100">
    <!--    Sidebar component-->
    <sidebar />
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <AppHeader />
      <main
        class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none"
        tabindex="0"
      >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <!-- Replace with your content -->
          <div class="py-2">
            <Nuxt />
          </div>
          <!-- /End replace -->
        </div>
      </main>
    </div>
  </div>
</template>
<script>
import Sidebar from '../components/Sidebar'
import AppHeader from '../components/AppHeader'
export default {
  components: { AppHeader, Sidebar },
}
</script>
