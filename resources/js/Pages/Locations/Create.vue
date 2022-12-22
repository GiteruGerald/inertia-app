

<template>
  <Head title="Locations" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Loations Create
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex m-2 p-2">
          <Link
            href="/locations"
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
                Add New Location
              </h2>
              <p class="leading-relaxed mb-5 text-gray-600">
                Post-ironic portland shabby chic echo park, banjo fashion axe
              </p>
              <form
              @submit.prevent="storeLocation"
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
                >
                  Submit
                </button>
              </form>
            </div>
          </div>
          <!-- <div class="grid place-content-center mt-10">
                <form enctype="multipart/form-data" class="bg-white shadow-md m-2 p-2 rounded">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Name</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" class="block w-full transition duration-150 ease-in-out">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white"> Create</button>
                    </div>
                </form>
            </div> -->
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
      name: null,
    })

    function storeLocation() {
      form.post('/locations')
    }

</script>