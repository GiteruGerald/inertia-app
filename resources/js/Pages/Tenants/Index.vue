<template>
    <Head title="Tenants" />
  
    <BreezeAuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Tenants Index
        </h2>
      </template>
  
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end m-2 p-2">
            <Link
              href="/tenants/create"
              class="
                px-4
                py-2
                bg-indigo-500
                hover:bg-indigo-600
                text-white
                rounded
              "
              >New Tenant</Link
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
                        Email
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
                        Unit
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
                    <tr v-for="tenant in tenants" :key="tenant.id">
                      <td class="px-6 py-4 whitespace-nowrap">
                        {{ tenant.name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        {{ tenant.email }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        {{ tenant.unit.unit_no }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <Link
                          :href="`/tenants/${tenant.id}/edit`"
                          class="text-indigo-600 hover:text-indigo-900"
                          >Edit</Link
                        >
                        /
                        <Link
                          :href="`/tenants/${tenant.id}`"
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
    tenants:Array
  })
  </script>