<template>
  <Head title="Properties" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Properties Index
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
          <Link
            href="/properties/create"
            class="
              px-4
              py-2
              bg-indigo-500
              hover:bg-indigo-600
              text-white
              rounded
            "
            >Create Property</Link
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
                      Image
                    </th>

                    <th
                      scope="col"
                      class="
                        flex
                        space-x-4
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
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="property in properties" :key="property.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <!-- <div class="flex-shrink-0 h-10 w-10">
                        <img src="https://placehold.it/50x50" alt="" class="h-10 w-10 rounded-full">
                      </div> -->
                      {{ property.name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <img :src="property.image" class="w-12 h-12 rounded" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <Link
                        :href="`/properties/${property.id}/edit`"
                        class="text-indigo-600 hover:text-indigo-900"
                        >Edit</Link
                      >
                      /
                      <Link
                        :href="`/properties/${property.id}`"
                        method="delete"
                        as="button"
                        type="button"
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
  properties: Array,
});
</script>
