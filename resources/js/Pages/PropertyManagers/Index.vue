<template>
    <Head title="P.Managers" />
  
    <BreezeAuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Property Managers Index
        </h2>
      </template>
  
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end m-2 p-2">
            <Link
              href="/managers/create"
              class="
                px-4
                py-2
                bg-indigo-500
                hover:bg-indigo-600
                text-white
                rounded
              "
              >New Manager</Link
            >
          </div>
          <div class="flex flex-col">
            <div
              class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
              <div
                class="
                  shadow
                  overflow-hidden
                  border-b border-gray-200
                  sm:rounded-lg
                "
              >
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
                        Name
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
                        Location
                      </th>
  
                      <th
                        scope="col"
                        class="
                        flex space-x-4
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          text-gray-500
                          uppercase
                          tracking-wider
                        "
                      ></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="manager in managers" :key="manager.id">
                      <td class="px-6 py-4 whitespace-nowrap">
                        {{ manager.name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        {{ manager.location.name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <Link
                          :href="`/managers/${manager.id}/edit`"
                          class="text-indigo-600 hover:text-indigo-900"
                          >Edit</Link
                        >
                        /
                        <Link
                          :href="`/managers/${manager.id}`"
                          method="delete" as="button" type="button"
                          class="text-red-600 hover:text-red-900"
                          >Delete</Link
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </BreezeAuthenticatedLayout>
  </template>
  <script setup>
  import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
  import { Head, Link } from "@inertiajs/inertia-vue3";
  
  const props = defineProps({
    managers:Array
  })
  </script>