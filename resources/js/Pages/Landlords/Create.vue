

<template>
  <Head title="Landlords" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Landlords Create
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex m-2 p-2">
          <Link
            href="/landlords"
            class="
              px-4
              py-2
              bg-indigo-500
              hover:bg-indigo-600
              text-white
              rounded
            "
            >Back</Link
          >
        </div>
        <div class="flex">
          <div class="container px-5 mx-auto flex">
            <div
              class="
                bg-white
                rounded-lg
                p-8
                flex flex-col
                md:ml-auto
                w-full
                mt-10
                md:mt-0
                relative
                z-10
                shadow-md
              "
            >
              <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">
                Add New Landlord
              </h2>
              <form
                @submit.prevent="storeLandlord"
                class="bg-white shadow-md m-2 p-2 rounded"
              >
                <div class="relative mb-4">
                  <label for="name" class="leading-7 text-sm text-gray-600"
                    >Name</label
                  >
                  <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    name="name"
                    class="
                      w-full
                      bg-white
                      rounded
                      border border-gray-300
                      focus:border-pink-500 focus:ring-2 focus:ring-pink-200
                      text-base
                      outline-none
                      text-gray-700
                      py-1
                      px-3
                      leading-8
                      transition-colors
                      duration-200
                      ease-in-out
                    "
                  />
                  <!-- Display error msg -->
                  <div
                    v-if="errors.name"
                    v-text="errors.name"
                    class="text-red-800 text-sm mt-2"
                  ></div>
                </div>
                <div class="relative mb-4">
                  <label
                    for="location"
                    class="block text-sm font-medium text-gray-700"
                    >Location</label
                  >
                  <select
                    class="
                      block
                      w-full
                      flex-1
                      rounded-none rounded-r-md
                      border-gray-300
                      focus:border-indigo-500 focus:ring-indigo-500
                      sm:text-sm
                    "
                    v-model="form.location_id"
                  >
                    <option
                      v-for="location in locations"
                      :value="location.id"
                      :key="location.id"
                    >
                      {{ location.name }}
                    </option>
                  </select>
                  <!-- Display error msg -->
                  <div
                    v-if="errors.location_id"
                    v-text="errors.location_id"
                    class="text-red-800 text-sm mt-2"
                  ></div>
                </div>
                <button
                  class="
                    text-white
                    bg-indigo-500
                    border-0
                    py-2
                    px-6
                    focus:outline-none
                    hover:bg-pink-600
                    rounded
                    text-lg
                  "
                  :disabled="processing"
                >
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
  <script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "@vue/reactivity";

let processing = ref(false)
const props = defineProps({
  locations: Array,
  errors: Object,
});

const form = useForm({
  name: null,
  location_id: null,
});

function storeLandlord() {
  processing.value = true
  form.post("/landlords");
}
</script>